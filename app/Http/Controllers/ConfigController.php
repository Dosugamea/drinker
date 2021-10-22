<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display the edit page
     *
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.config');
    }

}
