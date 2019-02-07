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



// ##################  ROUTES OF PANEL ################
Auth::routes();

Route::get('/home-panel', 'HomeController@index')->name('home-panel');
Route::get('/testeupload', 'HomeController@testAvatarUpload')->name('testeupload');


// ##################  ROUTES OF BANNER ################
Route::get('/page-inserir-banner', 'BannerController@index')->name('page-inserir-banner');
Route::get('/page-listar-banner', 'BannerController@listarBanner')->name('page-listar-banner');
Route::post('/input-banner', 'BannerController@insert');
Route::resource('/editbanner', 'BannerController');
Route::resource('/banner', 'BannerController');
Route::resource('/deletarbanner', 'BannerController');

// ##################  ROUTES OF NOTICE ################
Route::get('/page-inserir-notice', 'NoticeController@index')->name('page-inserir-notice');
Route::get('/page-listar-notice', 'NoticeController@listarNotice')->name('page-listar-notice');
Route::post('/input-notice', 'NoticeController@insert');
Route::resource('/editnotice', 'NoticeController');
Route::resource('/notice', 'NoticeController');
Route::resource('/deletarnotice', 'NoticeController');

// ##################  ROUTES OF DESTAQUE NOTICE ################
Route::get('/page-inserir-noticedestaque', 'NoticeDestaqueController@index')->name('page-inserir-noticedestaque');
Route::get('/page-listar-noticedestaque', 'NoticeDestaqueController@listarNotice')->name('page-listar-noticedestaque');
Route::post('/input-noticedestaque', 'NoticeDestaqueController@insert');
Route::resource('/editnoticedestaque', 'NoticeDestaqueController');
Route::resource('/noticedestaque', 'NoticeDestaqueController');
Route::resource('/deletarnoticedestaque', 'NoticeDestaqueController');

// ##################  ROUTES OF TRANSPARENCY ################
Route::get('/page-inserir-transparency', 'TransparencyController@index')->name('page-inserir-transparency');
Route::get('/page-listar-transparency', 'TransparencyController@listarTransparency')->name('page-listar-transparency');
Route::post('/input-transparency', 'TransparencyController@insert');
Route::resource('/edittransparency', 'TransparencyController');
Route::resource('/transparency', 'TransparencyController');
Route::resource('/deletartransparency', 'TransparencyController');
