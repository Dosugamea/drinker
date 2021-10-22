<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeverageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // TODO: Add beverage model
        return view('beverages.show');
    }

}
