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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/releases', function () {
    return App\Release::all();
});

Route::get('/releases/{id}/songs', function ($releaseId) {
    return App\Release::find($releaseId)->songs;
});

Route::get('/concerts', function () {
    return App\Concert::all();
});

Route::get('/concerts/{id}/songs', function ($concertId) {
    return App\Concert::find($concertId)->songs;
});
