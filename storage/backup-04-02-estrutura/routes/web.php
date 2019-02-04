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

// ROUTES OF SITE
Route::get('/', function () {
    $date = date('Y');
    return view('home-site', compact('date'));
});


// ################## // ROUTES OF SITE ################


// ROUTES OF PANEL
Auth::routes();

Route::get('/home-panel', 'HomeController@index')->name('home-panel');
Route::get('/page-inserir-banner', 'BannerController@index')->name('page-inserir-banner');
Route::get('/page-listar-banner', 'BannerController@listarBanner')->name('page-listar-banner');
Route::post('/input-banner', 'BannerController@insert');

// ################## // ROUTES OF PANEL ################
