<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductAskController extends Controller
{
    /**
     * 楽天商品検索APIを叩いてデータを取ってくる
     *
     * @return \Illuminate\Http\Response
     */
    public function ask(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_ask = ProductAsk::where('product_id', $product_id)->get();
        return response()->json(
            ['status' => 200]
        );
    }
}
