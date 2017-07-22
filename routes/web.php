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

Route::get('/', 'dashboardController@index');

/**
 *
 * Devices Routes
 *
 */
Route::prefix('/devices')->group(function (){

    //Index
    Route::get('/', 'devicesController@index');
    //Add Device
    Route::any('/add', 'devicesController@add');
    //Add Device
    Route::any('/edit/{id}', 'devicesController@edit');
    //Delete Device
    Route::get('/delete/{id}', 'devicesController@delete');


});

Route::prefix('/schedule')->group(function (){
    //Index
    Route::get('/', 'scheduleController@index');
    //Add course
    Route::any('/add', 'scheduleController@add');
    //Edit course
    Route::any('/edit/{id}', 'scheduleController@edit');
    //Delete course
    Route::get('/delete/{id}', 'scheduleController@delete');
    //Add announcement
    Route::any('/announce/{id}', 'scheduleController@announce');




});



//Informational JSON Routes :

Route::get('/devicesid', function (){

    $devices = \App\Device::all();
    return $devices->toJson();
});

Route::get('/ip', function (){

    $ips = \App\Device::all()->pluck('ip_address');

    return $ips;

});

Route::get('/test', function (){
    $l = \App\Lecture::all()->first();
    $lt = new \Carbon\Carbon($l->getStartTime());


    dd(\Carbon\Carbon::now()->gt($lt) && \Carbon\Carbon::now()->lt($lt->addMinutes($l->getDuration())));
});
