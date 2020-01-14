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

Auth::routes();


    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/items_page', 'PageController@items');
    Route::get('/sl_codes_page', 'PageController@sl_codes');
    Route::get('/items_dm_page', 'PageController@items_dm');
    Route::get('/homis_dm_page', 'PageController@homis_dm');
    Route::get('/homis_ms_page', 'PageController@homis_ms');

    Route::resource('item', 'Api\ItemController');
    Route::resource('sl_code', 'Api\SlCodesController');
    Route::resource('brand', 'Api\BrandController');
    Route::resource('category', 'Api\CategoryController');
    Route::resource('homis_dm', 'Homis\DmController');

    Route::put('homis_dm/{dmdcomb}/{dmdctr}', 'Homis\DmController@update');

    Route::get('homis_ms', 'Homis\MsController@index');
    Route::post('homis_ms', 'Homis\MsController@update');

    Route::get('items_dm', 'Api\ItemController@items_dm');
    Route::post('item_dm', 'Api\ItemController@store');


