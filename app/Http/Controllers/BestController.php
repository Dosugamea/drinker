<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BestController extends Controller
{
    /**
     * Display the best logged beverages
     *
     * @return \Illuminate\Http\Response
     */
    public function logs()
    {
        return view('profile.best.logs');
    }

    /**
     * Display the best rated reviews
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews()
    {
        return view('profile.best.reviews');
    }
}
