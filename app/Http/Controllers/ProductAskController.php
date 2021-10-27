<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RakutenRws_Client;
use App\Beverage;

class ProductAskController extends Controller
{
    /**
     * 楽天商品検索APIを叩いてデータを取ってくる
     *
     * @return \Illuminate\Http\Response
     */
    public function ask(Request $request)
    {
        // JANコード バリデーション
        $rules = [
            'jan_code' => ['required', 'digits_between:8,13']
        ];
        $this->validate($request, $rules);
        $jan_code = $request->input('jan_code');
        Log::debug('ログサンプル', ['memo' => $jan_code]);
        // 既存ドリンクであればそれを返す
        $beverage = Beverage::where('jan_code', $jan_code)->first();
        if($beverage != NULL) {
            return response()->json(
                [
                    'status' => 'success',
                    'from' => 'db',
                    'name' => $beverage->title
                ]
            );
        }
        // 楽天商品検索APIを初期化
        $client = new RakutenRws_Client();
        $client->setApplicationId(config('app.rakuten_id'));
        $client->setAffiliateId(config('app.rakuten_affiliate'));
        // 楽天商品検索APIを叩く
        $response = $client->execute('IchibaItemSearch', array(
            'keyword' => $jan_code,
            'min_price' => 100,
            'max_price' => 5000,
            'imageFlag' => 1,
            'genreId' => 100316
        ));
        if (!$response->isOk()) {
            return response()->json(
                [ 'status' => 'error', 'resp' => $response->getMessage() ],
                503
            );
        }
        if ($response->getData()['count'] == 0) {
            return response()->json(
                [ 'status' => 'error', 'resp' => '一致する商品が見つかりませんでした(本当にソフトドリンクですか?)' ],
                404
            );
        }
        Log::debug('ログサンプル', ['memo' => $response]);
        // 商品情報から商品名だけを取り出す
        $productNames = array();
        foreach ($response as $product) {
            array_push($productNames, $product['itemName']);
        }
        // それっぽい文字列に置き換える正規表現
        // 商品名それぞれを正規表現で置き換えて全角スペースを半角に置き換え
        $pattern = '/【.+?】|『.+?』|（.+?）|\[.+?\]|送料無料|飲料|\d+円|期間限定|注文|ふるさと納税|PET|ペットボトル|\d*?ml|×|\d??ケース|\d??L|\d??個|\d*?本?|\(.+?\)|※.+?$/';
        $productNames = array_map(function($value) use ($pattern) {
            return str_replace('　', ' ', preg_replace($pattern, '', $value));
        }, $productNames);
        // 商品名を半角スペースで切り出して配列にする
        $keywords = array_map(function($value) {
            return explode(' ', $value);
        }, $productNames);
        // 二次元配列になっているので一次元に戻す
        $keywords = array_reduce($keywords, 'array_merge', []);
        Log::debug('ログサンプル', ['memo' => $keywords]);
        // 配列内の要素を数えて キー/個数 の連想配列作成
        $counts = array_count_values($keywords);
        // 2回以上出現するキーワードのみに絞り込み
        Log::debug('ログサンプル', $counts);
        $counts = array_filter($counts, function($element) {
            return $element > 1;
        });
        // 個数を元にソート
        arsort($counts);
        // 連想配列のキーだけを配列に
        $sortedKeywords = array_keys($counts);
        $beverageName = implode(' ', array_slice($sortedKeywords, 0, 5));
        // 応答を返す
        return response()->json(
            [
                'status' => 'success',
                'from' => 'rakuten',
                'name' => $beverageName
            ]
        );
    }
}
