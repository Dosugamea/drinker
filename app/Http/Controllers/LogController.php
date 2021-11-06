<?php

namespace App\Http\Controllers;

use App\Log;
use App\Beverage;
use App\Shared\BeverageFetcher;
use App\Http\Requests\LogRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logs = \Auth::user()->logs()->orderBy('created_at', 'desc')->paginate(10);
        return view('profile.logs.index', [
            'logs' => $logs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.logs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\LogRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogRequest $request)
    {
        // バリデーションは 既にされている
        DB::beginTransaction();
        // ドリンクを取得
        $fetcher = new BeverageFetcher;
        $beverage = $fetcher->fetchByLogRequest($request);
        if($beverage == NULL) {
            DB::rollback();
            return back();
        };
        // こちらは複数重複する投稿を作成可能
        $review = Log::create([
            'body' => $request->logBody,
            'price' => $request->logPrice,
            'count' => $request->logCount,
            'beverage_id' => $beverage->id,
            'user_id' => \Auth::id(),
        ]);
        DB::commit();
        return redirect('profile.logs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(log $log)
    {
        return view('profile.logs.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(log $log)
    {
        //
    }
}
