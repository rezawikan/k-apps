<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('technology/multiplier', 'Api\RolesTechnologyController@index')->name('technology-multiplier.index');
Route::get('technology/list', 'Api\TechnologyListsController@list')->name('technology-list.index');
Route::get('distribution-target/list', 'Api\DistributionTargetController@list')->name('distribution-target-list.index');
Route::post('project-technology', 'Api\ProjectTechnologyController@store')->name('project-technology.store');
Route::get('project-technology/{idp}/{pivotID}/list', 'Api\ProjectTechnologyController@edit')->name('project-technology.edit');
Route::put('project-technology/{idp}/{pivotID}/update', 'Api\ProjectTechnologyController@update')->name('project-technology.update');
