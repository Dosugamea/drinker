<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beverage;

class BeverageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $beverage = Beverage::find($id);
        return view('beverages.show', compact('beverage'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reviews()
    {
        // TODO: Add beverage model
        return view('beverages.reviews.index');
    }
}
