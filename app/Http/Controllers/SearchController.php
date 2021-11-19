<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Beverage;
use App\Tag;

class SearchController extends Controller
{
    /**
     * Display search result page
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // 要求出力: reviewまたはbeverage
        $searchType = $request->input('type', 'beverage');
        // 検索キーワード: 任意の文字列
        $query = $request->input('query', '');
        // レビューを検索する場合
        if ($searchType == 'review') {
            $reviews = Review::orderBy('created_at', 'desc');
            // キーワードで絞り込み
            if ($query != '') {
                $reviews = $reviews->where('title', 'like', '%' . $query . '%')
                ->orWhere('body', 'like', '%' . $query . '%');
            }
            // ページネーション生成
            $reviews = $reviews->paginate(10);
            return view('search', compact('reviews'));
        // 飲み物を検索する場合
        } else {
            $beverages = Beverage::orderBy('created_at', 'desc');
            // タグで絞り込み
            $searchTags = [$request->input('tag'), $request->input('category')];
            foreach ($searchTags as $searchTag) {
                if ($searchTag != NULL) {
                    $tag = Tag::where('name', $searchTag)->firstOrFail();
                    $beverages = $beverages->whereHas('tags', function ($query) use ($tag) {
                        $query->where('tag_id', $tag->id);
                    });
                }
            }
            // キーワードで絞り込み
            if ($query != '') {
                $beverages = $beverages->where('title', 'like', '%' . $query . '%')
                ->orWhere('description', 'like', '%' . $query . '%');
            }
            // ページネーション生成
            $beverages = $beverages->paginate(10);
            return view('search', compact('beverages'));
        }
    }
}
