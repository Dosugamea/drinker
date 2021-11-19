<?php

namespace App\Http\Controllers;

use App\Review;
use App\Beverage;
use App\Tag;
use App\Shared\BeverageFetcher;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = \Auth::user()->reviews()->orderBy('created_at', 'desc')->paginate(10);
        $pageTitle = '投稿した試飲記録一覧';
        return view('profile.reviews.index', compact('reviews', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        // バリデーションは 既にされている
        DB::beginTransaction();
        // ドリンクを取得
        $fetcher = new BeverageFetcher;
        $beverage = $fetcher->fetchByReviewRequest($request);
        $user_id = \Auth::id();
        if($beverage == NULL) {
            DB::rollback();
            return back();
        }
        // 既にレビュー投稿済みであれば上書きする(暗黙の仕様)
        $review = Review::firstOrNew([
            'user_id' => $user_id,
            'beverage_id' => $beverage->id,
        ]);
        $review->title = $request->reviewTitle;
        $review->star = $request->reviewRate;
        $review->body = $request->reviewBody;
        $review->save();
        // レビュー画像の保存
        if ($request->file('files') != NULL) {
            foreach ($request->file('files') as $index=> $e) {
                $ext = $e['photo']->guessExtension();
                $filename = "{$user_id}_{$request->janCode}_{$index}.{$ext}";
                $path = $e['photo']->storeAs('public/reviews', $filename);
                $review->images()->create([
                    'path'=> $path,
                    'order'=> $index,
                    'user_id' => $user_id,
                ]);
            }
        }
        // 前のURLへリダイレクトさせる
        DB::commit();
        return redirect()->route('profile.reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(review $review)
    {
        // TODO: レビューから飲み物情報を取得して /beverages/{id}/reviews/{review}に飛ばす
        return view('beverage.reviews.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, review $review)
    {
        //
    }
}
