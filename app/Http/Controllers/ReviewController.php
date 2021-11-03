<?php

namespace App\Http\Controllers;

use App\Review;
use App\Beverage;
use App\Rakuten;
use App\Http\Requests\ReviewRequest;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.reviews.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        // バリデーションは 既にされている
        // ドリンクが存在するなら取得
        $beverage = Beverage::where('jan_code', $request->janCode)->first();
        DB::beginTransaction();
        if($beverage == NULL) {
            // 無かったら ドリンクを作成
            $beverage = Beverage::create([
                'title' => $request->title,
                'description' => '',
                'jan_code' => $request->janCode,
                'user_id' => \Auth::id(),
            ]);
            // 商品検索APIを改めて叩く
            $client = new RakutenRws_Client();
            $client->setApplicationId(config('app.rakuten_id'));
            $client->setAffiliateId(config('app.rakuten_affiliate'));
            $response = $client->execute('IchibaItemSearch', array(
                'keyword' => $jan_code,
                'min_price' => 100,
                'max_price' => 5000,
                'imageFlag' => 1,
                'genreId' => 100316
            ));
            if (!$response->isOk()) {
                DB::rollback();
                return back();
            }
            if ($response->getData()['count'] != 0) {
                foreach ($response as $product) {
                    Rakuten::create([
                        'title' => $product['itemName'],
                        'body' => $product['itemCaption'],
                        'beverage_id' => $request->janCode,
                        'user_id' => \Auth::id(),
                    ]);
                }
            }
        }
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $review = Review::create([
            'title' => $request->title,
            'star' => $request->star,
            'body' => $request->body,
            'user_id' => \Auth::id(),
            'beverage_id' => $beverage->id,
        ]);

        // レビュー画像の保存
        foreach ($request->file('files') as $index=> $e) {
            $ext = $e['photo']->guessExtension();
            $filename = "{$request->jan}_{$index}.{$ext}";
            $path = $e['photo']->storeAs('photos', $filename);
            $review->images()->create(['path'=> $path]);
        }

        // 前のURLへリダイレクトさせる
        DB::commit();
        return back();
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
