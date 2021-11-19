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

// Twitterログイン
Route::get('auth/login/twitter', [TwitterLoginController::class, 'redirectToProvider'])->name('redirectToProvider');
Route::get('auth/twitter/callback', [TwitterLoginController::class, 'handleProviderCallback']);

// トップページ
Route::get('/', 'IndexController@index')->name('index');
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
    Route::get('/', 'BeverageController@show')->name('beverage');
    // レビュー一覧
    Route::get('/reviews', 'BeverageController@reviews')->name('reviews');
    // レビュー表示
    Route::get('/reviews/{review_id}', 'BeverageController@review')->name('review');
    // レビュー投票
    Route::post('/reviews/{review_id}/vote', 'BeverageController@voteReview')->name('review.vote');
    // 飲料投票
    Route::post('/vote', 'BeverageController@voteBeverage')->name('beverage.vote');
    // タグ追加
    Route::post('/tags/add', 'BeverageController@addTag')->name('addTag');
    // タグ削除
    Route::post('/tags/remove', 'BeverageController@removeTag')->name('removeTag');
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
    // 飲み物情報のAPI問い合わせ
    Route::post('ask/product', 'ProductAskController@ask');
});