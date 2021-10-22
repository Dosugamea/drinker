<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RankingController extends Controller
{
    /**
     * Display a ranking by logs count.
     *
     * @return \Illuminate\Http\Response
     */
    public function logs()
    {
        return view('rankings.logs');
    }

    /**
     * Display a ranking by reviews count.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews()
    {
        return view('rankings.reviews');
    }

    /**
     * Display a ranking by totals count.
     *
     * @return \Illuminate\Http\Response
     */
    public function totals()
    {
        return view('rankings.totals');
    }
}
