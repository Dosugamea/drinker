<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TwitterLoginController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\BeverageQuestionController;
use App\Http\Controllers\BeverageAnswerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\BestController;


// Twitterログイン
Route::get('auth/login/twitter', [TwitterLoginController::class, 'redirectToProvider']);
Route::get('auth/twitter/callback', [TwitterLoginController::class, 'handleProviderCallback']);

// トップページ
Route::get('/', function () {
    return view('index');
});
Route::redirect('/profile', '/');

// ランキングページ
Route::group(['prefix' => 'rankings/', 'as' => 'rankings.'], function () {
    Route::get('reviews', 'RankingController@reviews')->name('reviews');
    Route::get('logs', 'RankingController@logs')->name('logs');
    Route::get('totals', 'RankingController@totals')->name('totals');
});

// 検索ページ
Route::get('search', 'SearchController@search')->name('search.search');

// ドリンク詳細ページ
Route::group(['prefix' => 'beverages/{beverage_id}', 'as' => 'beverages.'], function () {
    Route::get('/', 'BeverageController@index')->name('beverage');
    // レビュー一覧
    Route::get('/reviews', 'BeverageController@reviews')->name('reviews');
    Route::get('/reviews/{review_id}', 'BeverageController@review')->name('review');
    Route::post('/reviews/{review_id}/vote', 'BeverageController@review_vote')->name('review.vote');
    // 質問
    Route::resource(
        '/questions',
        'BeverageQuestionController',
        ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]
    );
    // 質問への回答
    Route::resource(
        '/questions/{question_id}/answers',
        'BeverageAnswerController',
        ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]
    );
});

// ユーザー情報
Route::get('/users/{id}', 'UserController@show')->name('users.show');

// 要ログイン
Route::middleware('auth')->group(function () {
    // ユーザー関連ページ
    Route::group(['prefix' => 'profile/', 'as' => 'profile.'], function () {
        // プロフィール編集ページ
        Route::get('config', 'ConfigController@edit')->name('config.edit');
        Route::put('config', 'ConfigController@update')->name('config.update');
        // レビュー投稿ページ
        Route::resource(
            'reviews',
            'ReviewController',
            ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]
        );
        // 記録投稿ページ
        Route::resource(
            'logs',
            'LogController',
            ['only' => ['index', 'create', 'store', 'show', 'edit', 'update', 'destroy']]
        );
        // ベストドリンク/ベストレビューページ
        Route::group(['prefix' => 'best/'], function () {
            Route::get('reviews', 'BestController@reviews')->name('best.reviews');
            Route::get('beverages', 'BestController@beverages')->name('best.beverages');
        });
    });
});
