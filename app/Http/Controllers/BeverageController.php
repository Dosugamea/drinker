<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beverage;
use App\Review;
use App\Tag;

class BeverageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $beverage = Beverage::findOrFail($id);
        $score = $beverage->votes()->sum('votes');
        $reviews = $beverage->reviews()->orderBy('created_at', 'desc')->take(3)->get();
        $tags = $beverage->tags()->orderBy('type')->get()->map(
            function ($tag) {
                return ['name'=>$tag->name, 'type'=>$tag->type];
            }
        )->all();
        return view('beverages.show', compact('beverage', 'tags', 'reviews', 'score'));
    }

    /**
     * Listing reviews for a beverage.
     *
     * @param  int  $beverage_id
     * @return \Illuminate\Http\Response
     */
    public function reviews(int $beverage_id)
    {
        $pageTitle = 'レビュー一覧';
        $beverage = Beverage::findOrFail($beverage_id);
        $reviews = $beverage->reviews()->orderBy('created_at', 'desc')->paginate(10);
        return view('beverages.reviews.index', compact('beverage', 'reviews', 'pageTitle'));
    }

    /**
     * Show a review for a beverage.
     *
     * @param  int  $beverage_id
     * @param  int  $review_id
     * @return \Illuminate\Http\Response
     */
    public function review(int $beverage_id, int $review_id)
    {
        $pageTitle = 'レビュー';
        $review = Review::findOrFail($review_id);
        $score = $review->votes()->sum('votes');
        $beverage = $review->beverage;
        return view('beverages.reviews.show', compact('beverage', 'review', 'pageTitle', 'score'));
    }

    /**
     * Add specified tag to this beverage resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  int  $beverage_id
     * @return \Illuminate\Http\Response
     */
    public function addTag(Request $request, int $beverage_id)
    {
        // 飲み物が存在しない場合はエラー
        $beverage = Beverage::findOrFail($beverage_id);
        // ログインしていない場合はエラー
        $user_id = \Auth::id();
        if ($user_id == NULL) {
            return response()->json(
                ['status' => 'error', 'message' => 'You must login before action.'],
                400
            );
        }
        /* @var $tagName string|null */
        $tagName = $request->input('name');
        /* @var $ary_tags int[] */
        $ary_tags = $beverage->tags()->get()->map(
            function ($tag) {
                return $tag->name;
            }
        )->all();
        // 既にタグがついている場合はエラー
        if (in_array($tagName, $ary_tags)) {
            return response()->json(
                ['status' => 'error', 'message' => 'Tag already exists.'],
                400
            );
        }
        // タグ名の長さが21以上の場合はエラー
        if (strlen($tagName) > 20) {
            return response()->json(
                ['status' => 'error', 'message' => 'Tag name is too long.'],
                400
            );
        }
        // 既存タグを取得または作成
        $tag = Tag::firstOrCreate(
            ['name' => $tagName],
            ['name_en' => $tagName, 'type' => 1, 'user_id' => $user_id]
        );
        // カテゴリタグを追加しようとした場合はエラー
        if ($tag->type != 1) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => "You can't add category tag to specified resource."
                ],
                401
            );
        }
        // これでbeverage_tagsに追加される(即時commitされる)
        $beverage->tags()->attach($tag->id, ['user_id' => $user_id]);
        return response()->json(
            ['status' => 'success']
        );
    }

    /**
     * Remove specified tag from beverage resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  int  $beverage_id
     * @return \Illuminate\Http\Response
     */
    public function removeTag(Request $request, int $beverage_id)
    {
        // 飲み物が存在しない場合はエラー
        $beverage = Beverage::findOrFail($beverage_id);
        // ログインしていない場合はエラー
        $user_id = \Auth::id();
        if ($user_id == NULL) {
            return response()->json(
                ['status' => 'error', 'message' => 'You must login before action.'],
                400
            );
        }
        /* @var $tagName string|null */
        $tagName = $request->input('name');
        /* @var $arrayTags int[] */
        $arrayTags = $beverage->tags()->get()->map(
            function ($tag) {
                return $tag->name;
            }
        )->all();
        // 既にタグがついていない場合はエラー
        if (!in_array($tagName, $arrayTags)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Tag was not attached to the specified resource.'
                ],
                400
            );
        }
        // タグが存在しない場合はエラー
        /* @var $tag Tag */
        $tag = Tag::where('name', $tagName)->get()->first();
        if ($tag == NULL) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'Tag was not attached to the specified resource.'
                ],
                400
            );
        }
        // カテゴリタグを削除しようとした場合はエラー
        if ($tag->type != 1) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => "You can't remove category tag from specified resource."
                ],
                401
            );
        }
        // これでbeverage_tagsから削除される(即時commitされる)
        $beverage->tags()->detach($tag->id);
        // タグがもう使われていない場合はタグを削除
        if ($tag->beverages()->count() == 0) {
            $tag->delete();
        }
        return response()->json(
            ['status' => 'success']
        );
    }

    /**
     * Add vote to specified beverage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  int  $beverage_id
     * @return \Illuminate\Http\Response
     */
    public function voteBeverage(Request $request, int $beverage_id)
    {
        // ログインしていない場合はエラー
        $user_id = \Auth::id();
        if ($user_id == NULL) {
            return back();
        }
        // 飲み物が存在しない場合はエラー
        $beverage = Beverage::findOrFail($beverage_id);
        $beverage->votes()->firstOrCreate(
            ['user_id'=> $user_id],
            ['votes'=>1, 'user_id' => $user_id]
        );
        return back();
    }

    /**
     * Add vote to specified review.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  int  $beverage_id
     * @param  int  $review_id
     * @return \Illuminate\Http\Response
     */
    public function voteReview(Request $request, int $beverage_id, int $review_id)
    {
        // ログインしていない場合はエラー
        $user_id = \Auth::id();
        if ($user_id == NULL) {
            return back();
        }
        // 飲み物が存在しない場合はエラー
        $review = Review::findOrFail($review_id);
        // 既に評価済みならは削除
        $existedVote = $review->votes()->where('user_id', $user_id)->first();
        if ($existedVote != NULL) {
            $existedVote->delete();
        }
        // 新しい評価を作成して追加
        $newVoteValue = $request->input('vote') == '1'  ? 1 : -1;
        $review->votes()->create(
            ['votes'=> $newVoteValue, 'user_id' => $user_id]
        );
        return back();
    }
}
