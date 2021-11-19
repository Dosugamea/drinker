<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('manager/beverages', BeverageController::class);
    $router->resource('manager/logs', LogController::class);
    $router->resource('manager/reviews', ReviewController::class);
    $router->resource('manager/rakutens', RakutenController::class);
    $router->resource('manager/images', ImageController::class);
    $router->resource('manager/tags', TagController::class);
    $router->resource('manager/beverage-tags', BeverageTagController::class);
    $router->resource('manager/votes', VoteController::class);
});
