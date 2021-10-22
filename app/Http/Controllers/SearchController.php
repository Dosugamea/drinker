<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display search result page
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        return view('search');
    }
}
