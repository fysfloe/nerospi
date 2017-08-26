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

Route::get('/', 'SettlementController@index');

Route::resource('settlers', 'SettlerController');
Route::resource('settlements', 'SettlementController');
Route::resource('buildings', 'BuildingController');
Route::resource('nscs', 'NSCController');
Route::resource('jobs', 'JobController');

Route::post('settlements/changeHealth', 'SettlementController@changeHealth')->name('settlements.changeHealth');
Route::post('buildings/destroyAllUnder', 'BuildingController@destroyAllUnder')->name('buildings.destroyAllUnder');
