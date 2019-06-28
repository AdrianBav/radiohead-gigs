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

// temp
Route::get('/stats', 'StatisticsController@stats');

Route::get('/', 'StatisticsController@index');
Route::get('concerts/{concert}', 'StatisticsController@concert');
