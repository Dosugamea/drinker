<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Beverage;

class BestController extends Controller
{
    /**
     * Display the best logged beverages
     *
     * @return \Illuminate\Http\Response
     */
    public function logs()
    {
        $pageTitle = 'マイベストドリンク(購買記録数順)';
        $beverages = Beverage::withCount('logs')
            ->orderBy('logs_count', 'desc')
            ->paginate(10);
        return view('profile.best.logs', compact('beverages', 'pageTitle'));
    }

    /**
     * Display the best rated reviews
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews()
    {
        $pageTitle = 'マイベストレビュー(レビュー評価順)';
        $reviews = \Auth::user()->reviews();
        $reviews = $reviews->withCount([
            'votes AS score' => function ($query) {
                $query->select(DB::raw('SUM(votes) AS score'));
        }])->orderBy('score', 'desc')->paginate(10);
        return view('profile.best.reviews', compact('reviews', 'pageTitle'));
    }
}
