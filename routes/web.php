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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('default');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/impact-tracker', 'ImpactTrackerController@index')->name('impact-tracker.index');
Route::get('/travel', function () {
    return view('travel.index');
})->name('travel.index');
Route::get('/procurement', function () {
    return view('procurement.index');
})->name('procurement.index');
Route::get('/ops-manual', function () {
    return view('ops-manual.index');
})->name('ops-manual.index');
Route::get('/human-resources', function () {
    return view('human-resources.index');
})->name('human-resources.index');
Route::get('/k-nowledge', function () {
    return view('k-nowledge.index');
})->name('k-nowledge.index');
Route::get('/photo-stock', function () {
    return view('photo-stock.index');
})->name('photo-stock.index');
