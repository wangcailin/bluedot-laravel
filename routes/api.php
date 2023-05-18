<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:platform')->get('/user', function (Request $request) {
    return auth('platform')->user();
});

Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
    Route::group(['middleware' => 'auth:backend'], function () {

        Route::group(['prefix' => 'demo', 'namespace' => 'Demo'], function () {
            Route::group(['prefix' => 'form'], function () {
                Route::get('{id}', 'Controller@get'); // 获取单个数据
                Route::put('{id}', 'Controller@update'); // 更新数据
            });
            Route::get('', 'Controller@getList'); // 获取列表
            Route::post('', 'Controller@create'); // 创建数据
            Route::get('{id}', 'Controller@get'); // 获取单个数据
            Route::put('{id}', 'Controller@update'); // 更新数据
            Route::delete('{id}', 'Controller@delete'); // 删除数据
        });
    });
});

Route::group(['prefix' => 'platform', 'namespace' => 'Platform'], function () {
    Route::group(['middleware' => 'auth:platform'], function () {

        Route::group(['prefix' => 'demo', 'namespace' => 'Demo'], function () {
            Route::get('', 'Controller@getList'); // 获取列表
            Route::post('', 'Controller@create'); // 创建数据
            Route::get('{id}', 'Controller@get'); // 获取单个数据
            Route::put('{id}', 'Controller@update'); // 更新数据
            Route::delete('{id}', 'Controller@delete'); // 删除数据
        });
    });
});
