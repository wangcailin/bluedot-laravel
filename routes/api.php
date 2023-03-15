<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'backend', 'namespace' => 'Backend'], function () {
    Route::group(['middleware' => 'auth:backend'], function () {

        Route::group(['prefix' => 'demo', 'namespace' => 'Demo'], function () {
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
