<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beverage;
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
        $tags = $beverage->tags()->get()->map(
            function ($tag) {
                return ['name'=>$tag->name, 'type'=>$tag->type];
            }
        )->all();
        return view('beverages.show', compact('beverage', 'tags'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews()
    {
        // TODO: Add beverage model
        return view('beverages.reviews.index');
    }

    /**
     * Add specified tag to this beverage resource.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTag(Request $request, int $id)
    {
        // 飲み物が存在しない場合はエラー
        $beverage = Beverage::findOrFail($id);
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
     * @return \Illuminate\Http\Response
     */
    public function removeTag(Request $request, int $id)
    {
        // 飲み物が存在しない場合はエラー
        $beverage = Beverage::findOrFail($id);
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
}
