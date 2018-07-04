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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::resource('impact-tracker', 'ProjectController');
    Route::get('/impact-tracker/{id}/create', 'ProjectTechnologyController@create')->name('impact-tracker-tech.create');
    Route::post('/impact-tracker/{id}/store', 'ProjectTechnologyController@store')->name('impact-tracker-tech.store');
    Route::get('/impact-tracker/{id}/{idTech}/edit', 'ProjectTechnologyController@edit')->name('impact-tracker-tech.edit');
    Route::put('/impact-tracker/{id}/{idTech}/update', 'ProjectTechnologyController@update')->name('impact-tracker-tech.update');
    Route::delete('/impact-tracker/{id}/{idTech}/delete', 'ProjectTechnologyController@destroy')->name('impact-tracker-tech.destroy');
    Route::resource('manage/funding-type', 'FundingTypeController');
    Route::resource('manage/distribution-target', 'DistributionTargetController');
    Route::resource('manage/officer', 'OfficerController');
    Route::resource('manage/price-type', 'PriceTypeController');
    Route::resource('manage/project-type', 'ProjectTypeController');
    Route::resource('manage/technology', 'TechnologyController');

    Route::get('/travel', function () {
        return view('travel.index');
    })->name('travel.index');
    Route::get('/procurement', function () {
        return view('procurement.index');
    })->name('procurement.index');
    Route::get('/finance', function () {
        return view('finance.index');
    })->name('finance.index');
    Route::get('/k-mrp', function () {
        return view('k-mrp.index');
    })->name('k-mrp.index');
    Route::get('/human-resources', function () {
        return view('human-resources.index');
    })->name('human-resources.index');
    Route::get('/photo-stock', function () {
        return view('photo-stock.index');
    })->name('photo-stock.index');
});
