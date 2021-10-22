<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeverageAnswerController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('beverages.questions.answers.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // TODO: Add beverage question model
        return view('beverages.questions.answers.show');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: Add beverage question model
        return view('beverages.questions.answers.create');
    }
}
