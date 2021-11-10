<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Beverage;

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
        $searchType = $request->input('type');
        if ($searchType == 'review') {
            $reviews = Review::where('title', 'like', '%' . $request->input('query') . '%')
            ->orWhere('body', 'like', '%' . $request->input('query') . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            return view('search', compact('reviews'));
        } else {
            $beverages = Beverage::where('title', 'like', '%' . $request->input('query') . '%')
            ->orWhere('description', 'like', '%' . $request->input('query') . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            return view('search', compact('beverages'));
        }
    }
}
