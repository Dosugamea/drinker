<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beverage;

class RankingController extends Controller
{
    /**
     * Display the total best beverages
     *
     * @return \Illuminate\Http\Response
     */
    public function totals()
    {
        $pageTitle = '総合人気ランキング';
        $beverages = Beverage::withCount('logs', 'reviews')
            ->orderByDesc('logs_count')
            ->orderByDesc('reviews_count')
            ->paginate(10);
        return view('rankings.shared', compact('beverages', 'pageTitle'));
    }

    /**
     * Display the best logged beverages
     *
     * @return \Illuminate\Http\Response
     */
    public function logs()
    {
        $pageTitle = '購買記録数ランキング';
        $beverages = Beverage::withCount('logs')
            ->orderBy('logs_count', 'desc')
            ->paginate(10);
        return view('rankings.shared', compact('beverages', 'pageTitle'));
    }

    /**
     * Display the best rated reviews
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews()
    {
        $pageTitle = '試飲記録数ランキング';
        $beverages = Beverage::withCount('reviews')
            ->orderBy('reviews_count', 'desc')
            ->paginate(10);
        return view('rankings.shared', compact('beverages', 'pageTitle'));
    }
}
