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
    Route::get('impact-tracker', 'ProjectController@index')->name('impact-tracker.index');
    Route::get('impact-tracker/{impact_tracker}/view', 'ProjectController@show')->name('impact-tracker.show');

    Route::group(['middleware' => 'role:administrator'], function () {
        //Project
        Route::group(['middleware' => 'role:administrator,create project'], function () {
            Route::get('impact-tracker/create', 'ProjectController@create')->name('impact-tracker.create');
            Route::post('impact-tracker', 'ProjectController@store')->name('impact-tracker.store');
        });
        Route::group(['middleware' => 'role:administrator,edit project'], function () {
            Route::get('impact-tracker/{impact_tracker}/edit', 'ProjectController@edit')->name('impact-tracker.edit');
            Route::put('impact-tracker/{impact_tracker}', 'ProjectController@update')->name('impact-tracker.update');
        });
        Route::group(['middleware' => 'role:administrator,delete project'], function () {
            Route::delete('impact-tracker/{impact_tracker}', 'ProjectController@destroy')->name('impact-tracker.destroy');
        });

        //Technology Project
        Route::group(['middleware' => 'role:administrator,create technology on project'], function () {
            Route::get('/impact-tracker/{id}/create', 'ProjectTechnologyController@create')->name('impact-tracker-tech.create');
            Route::post('/impact-tracker/{id}/store', 'ProjectTechnologyController@store')->name('impact-tracker-tech.store');
        });
        Route::group(['middleware' => 'role:administrator,edit technology on project'], function () {
            Route::get('/impact-tracker/{id}/{idTech}/edit', 'ProjectTechnologyController@edit')->name('impact-tracker-tech.edit');
            Route::put('/impact-tracker/{id}/{idTech}/update', 'ProjectTechnologyController@update')->name('impact-tracker-tech.update');
        });
        Route::group(['middleware' => 'role:administrator,delete technology on project'], function () {
            Route::delete('/impact-tracker/{id}/{idTech}/delete', 'ProjectTechnologyController@destroy')->name('impact-tracker-tech.destroy');
        });

        Route::group(['middleware' => 'role:administrator,manage project'], function () {
            Route::resource('manage/funding-type', 'FundingTypeController');
            Route::resource('manage/distribution-target', 'DistributionTargetController');
            Route::resource('manage/officer', 'OfficerController');
            Route::resource('manage/price-type', 'PriceTypeController');
            Route::resource('manage/project-type', 'ProjectTypeController');
            Route::resource('manage/technology', 'TechnologyController');
            Route::resource('manage/technology-type', 'TechnologyTypeController');
        });

        Route::group(['middleware' => 'role:administrator,view log'], function () {
            Route::get('log', 'LogController@index')->name('log.index');
        });
    });

    Route::get('k-feedback', function () {
        return view('k-feedback.index');
    })->name('k-feedback.index');

    Route::post('k-feedback','FeedbackController@store')->name('k-feedback.send');

    Route::get('travel', function () {
        return view('travel.index');
    })->name('travel.index');
    Route::get('procurement', function () {
        return view('procurement.index');
    })->name('procurement.index');
    Route::get('financial', function () {
        return view('financial.index');
    })->name('financial.index');
    Route::get('k-mrpt', function () {
        return view('k-mrpt.index');
    })->name('k-mrpt.index');
    Route::get('human-resources', function () {
        return view('human-resources.index');
    })->name('human-resources.index');
    Route::get('comms-assets', function () {
        return view('comms-assets.index');
    })->name('comms-assets.index');
});
