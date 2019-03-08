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

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('impact-tracker/export/project', 'ProjectController@export_project')->name('impact-tracker.export_project');
    Route::get('impact-tracker/export/technology', 'ProjectController@export_technology')->name('impact-tracker.export_technology');
    Route::get('impact-tracker', 'ProjectController@index')->name('impact-tracker.index');
    Route::get('impact-tracker/{impact_tracker}/view', 'ProjectController@show')->name('impact-tracker.show');

    // Route::get('birthday', 'BirthdayController@index');

    Route::get('profile', 'ProfileController@edit')->name('profile.index');
    Route::put('profile', 'ProfileController@update')->name('profile.update');

    Route::get('users', 'UserController@index')->name('users.index');

    Route::group(['middleware' => 'role:administrator'], function () {
      Route::get('project-trash', 'ProjectTrashController@index')->name('project-trash.index');
      Route::delete('project-trash/{id}', 'ProjectTrashController@destroy')->name('project-trash.destroy');
      Route::put('project-trash/{id}', 'ProjectTrashController@restore')->name('project-trash.restore');
    });


    Route::group(['middleware' => 'role:administrator,create user'], function () {
        Route::get('user/create', 'UserController@create')->name('users.create');
        Route::post('user/create', 'UserController@store')->name('users.store');
    });

    Route::group(['middleware' => 'role:administrator,edit user'], function () {
        Route::get('user/{id}/edit', 'UserController@edit')->name('users.edit');
        Route::put('user/{id}/update', 'UserController@update')->name('users.update');
    });


    Route::group(['middleware' => 'role:administrator,delete user'], function () {
        Route::delete('user/{id}/delete', 'UserController@destroy')->name('users.destroy');
    });

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
        Route::get('/impact-tracker/{id}/{pivotID}/edit', 'ProjectTechnologyController@edit')->name('impact-tracker-tech.edit');
        Route::put('/impact-tracker/{id}/{pivotID}/update', 'ProjectTechnologyController@update')->name('impact-tracker-tech.update');
    });
    Route::group(['middleware' => 'role:administrator,delete technology on project'], function () {
        Route::delete('/impact-tracker/{id}/{pivotID}/delete', 'ProjectTechnologyController@destroy')->name('impact-tracker-tech.destroy');
    });

    Route::group(['middleware' => 'role:administrator,manage project'], function () {
        Route::resource('manage/funding-type', 'FundingTypeController');
        Route::resource('manage/distribution-target', 'DistributionTargetController');
        Route::resource('manage/officer', 'OfficerController');
        Route::resource('manage/price-type', 'PriceTypeController');
        Route::resource('manage/project-type', 'ProjectTypeController');
        Route::resource('manage/technology', 'TechnologyController');
        Route::resource('manage/technology-type', 'TechnologyTypeController');
        Route::resource('manage/technology-rules', 'TechnologyRulesController');
    });

    Route::group(['middleware' => 'role:administrator,view log'], function () {
        Route::get('log', 'LogController@index')->name('log.index');
    });

    Route::get('k-feedback', function () {
        return view('k-feedback.index');
    })->name('k-feedback.index');

    Route::post('k-feedback', 'FeedbackController@store')->name('k-feedback.send');

    Route::get('travel', function () {
        return view('travel.index');
    })->name('travel.index');
    Route::get('procurement-and-advance', function () {
        return view('procurement-and-advance.index');
    })->name('procurement-and-advance.index');
    Route::get('financial-and-legal', function () {
        return view('financial-and-legal.index');
    })->name('financial-and-legal.index');
    Route::get('k-policies', function () {
        return view('k-policies.index');
    })->name('k-policies.index');
    Route::get('human-resources', function () {
        return view('human-resources.index');
    })->name('human-resources.index');
    Route::get('comms-assets', function () {
        return view('comms-assets.index');
    })->name('comms-assets.index');
});
