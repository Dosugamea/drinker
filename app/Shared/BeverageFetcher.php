<?php
namespace App\Shared;

use App\Beverage;
use App\Rakuten;
use App\Tag;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\LogRequest;
use Illuminate\Support\Facades\Auth;
use RakutenRws_Client;
use Illuminate\Support\Facades\DB;

class BeverageFetcher
{
    /**
     * レビューリクエストを利用し、DBもしくは楽天APIから飲料を取得する
     *
     * @param  App\Http\Requests\ReviewRequest  $request
     * @return App\Beverage
    */
    public function fetchByReviewRequest(ReviewRequest $request)
    {
        return $this->fetchBeverage($request);
    }

    /**
     * レビューリクエストを利用し、DBもしくは楽天APIから飲料を取得する
     *
     * @param  App\Http\Requests\LogRequest  $request
     * @return App\Beverage
    */
    public function fetchByLogRequest(LogRequest $request)
    {
        return $this->fetchBeverage($request);
    }

    /**
     * DBもしくは楽天APIから飲料を取得する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function fetchBeverage($request)
    {
        DB::beginTransaction();
        // バリデーションは 既にされている
        // ドリンクが存在するなら取得
        $beverage = Beverage::where('jan_code', $request->janCode)->first();
        $user_id = Auth::id();
        if($beverage == NULL) {
            // 無かったら ドリンクを作成
            $beverage = Beverage::create([
                'title' => $request->productName,
                'description' => '',
                'company' => $request->productCompany,
                'volume' => $request->productVolume,
                'ratingAverage' => 0,
                'ratingCount' => 0,
                'jan_code' => $request->janCode,
                'user_id' => $user_id,
            ]);
            // カテゴリが指定されていたらそれに紐付ける
            $categoryName = $request->productCategory;
            if ($categoryName != '') {
                $tagId = Tag::where([
                    ['name', '=', $categoryName],
                    ['type', '=', 0]
                ])->firstOrFail();
                $beverage->tags()->attach($tagId, ['user_id' => $user_id]);
            }
            // 商品検索APIを改めて叩く
            $client = new RakutenRws_Client();
            $client->setApplicationId(config('app.rakuten_id'));
            $client->setAffiliateId(config('app.rakuten_affiliate'));
            $response = $client->execute('IchibaItemSearch', array(
                'keyword' => $request->janCode,
                'min_price' => 100,
                'max_price' => 5000,
                'imageFlag' => 1,
                'genreId' => 100316
            ));
            if (!$response->isOk()) {
                DB::rollback();
                return NULL;
            }
            if ($response->getData()['count'] != 0) {
                foreach ($response as $index => $product) {
                    Rakuten::create([
                        'title' => $product['itemName'],
                        'body' => $product['itemCaption'],
                        'url' => $product['itemUrl'],
                        'price' => $product['itemPrice'],
                        'shopName' => $product['shopName'],
                        'beverage_id' => $beverage->id,
                    ]);
                    $beverage->images()->create([
                        'path'=> array_shift($product['mediumImageUrls'])['imageUrl'],
                        'order'=> $index,
                        'user_id' => $user_id
                    ]);
                }
            } else {
                DB::rollback();
                return NULL;
            }
        }
        return $beverage;
    }
}
