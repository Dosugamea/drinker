<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a user profile page
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('users.show');
    }
}
