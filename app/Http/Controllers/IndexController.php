<?php

namespace App\Http\Controllers;
use App\Review;
use App\Beverage;
use App\Log;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * Display a top page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->take(3)->get();
        $beverages = Beverage::orderBy('created_at', 'desc')->take(3)->get();
        $reviews_count = Review::count();
        $logs_count = Log::count();
        $users_count = User::count();
        if (\Auth::check()) {
            $user = \Auth::user();
            $user->loadRelationshipCounts();
            return view('profile.show', compact(
                'user',
                'reviews',
                'beverages',
                'reviews_count',
                'logs_count',
                'users_count'
            ));
        }
        return view('index',
            compact(
                'reviews',
                'beverages',
                'reviews_count',
                'logs_count',
                'users_count'
            )
        );
    }
}
