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

    $banner = \SescoopRO\Banner::All();
    $video = \SescoopRO\Video::All();
    $noticeDestaque = \SescoopRO\DestaqueNotice::All();
    $notice = \SescoopRO\Notice::orderBy('id','created_at', 'desc')->paginate(4);
    //$notice = \SescoopRO\Notice::orderBy('created_at','DESC');
    $date = date('Y');
    return view('home-site', compact('date', 'banner', 'video', 'noticeDestaque', 'notice'));

});


Route::get('notice/{id}/details', ['as' => 'details', function ($id) {
    //

    $notice = \SescoopRO\Notice::find($id);
    $date = date('Y');
    return view('pages-site.viewnoticedetails', compact('notice', 'date'));

    //  $categoria = DB::table('categoria')->lists('nome_categoria','nome_categoria');
}]);

//Site-Licitações
Route::get('/page-licitacoes', function () {

    $date = date('Y');
    $licitacao = \SescoopRO\Licitacoes::All();
    return view('pages-site.licitacoes', compact('licitacao', 'date'));


});
Route::get('detalhes/{id}/licitacao', function ($id) {
    $date = date('Y');
    $licitacao = \SescoopRO\Licitacoes::find($id);
    return view('pages-site.detalhes-licitacao', compact('licitacao', 'date'));
})->name('show');

Route::get('/licitacoes', function () {

    $date = date('Y');
    $licitacao = \SescoopRO\Licitacoes::All();
    return view('pages-site.table-licitacoes', compact('licitacao', 'date'));


});
//Site-Transparency
Route::get('/page-transparency', function () {

    $date = date('Y');
    $transparency = \SescoopRO\Transparency::All();
    return view('pages-site.transparency', compact('transparency', 'date'));


});
Route::get('detalhes/{id}/transparency', function ($id) {
    $date = date('Y');
    $transparency = \SescoopRO\Transparency::find($id);
    return view('pages-site.detalhes-transparency', compact('transparency', 'date'));

})->name('transparency');

Route::get('/trasparencies', function () {

    $date = date('Y');
    $transparency = \SescoopRO\Transparency::All();
    return view('pages-site.table-transparency', compact('transparency', 'date'));

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
Route::get('showtransparency/{id}/show', function ($id) {
    $date = date('Y');
    $transparency = \SescoopRO\Transparency::find($id);
    return view('pages-panel.showtransparency', compact('transparency', 'date'));
})->name('show');

// ##################  ROUTES OF LICITACAO ################
Route::get('/page-inserir-licitacao', 'LicitacaoController@index')->name('page-inserir-licitacao');
Route::get('/page-listar-licitacao', 'LicitacaoController@listarLicitacao')->name('page-listar-licitacao');
Route::post('/input-licitacao', 'LicitacaoController@insert');
Route::resource('/editlicitacao', 'LicitacaoController');
Route::resource('/licitacao', 'LicitacaoController');
Route::resource('/deletarlicitacao', 'LicitacaoController');
Route::get('showlicitacao/{id}/show', function ($id) {
    $date = date('Y');
    $licitacao = \SescoopRO\Licitacoes::find($id);
    return view('pages-panel.showlicitacao', compact('licitacao', 'date'));
})->name('show');

// ##################  ROUTES OF VIDEO ################
Route::get('/page-inserir-video', 'VideositeController@index')->name('page-inserir-video');
Route::get('/page-listar-video', 'VideositeController@listarVideo')->name('page-listar-video');
Route::post('/input-video', 'VideositeController@insert');
Route::resource('/editvideo', 'VideositeController');
Route::resource('/video', 'VideositeController');
Route::resource('/deletarvideo', 'VideositeController');
Route::get('showvideo/{id}/show', function ($id) {
    $date = date('Y');
    $video = \SescoopRO\Video::find($id);
    return view('pages-panel.showvideo', compact('video', 'date'));
})->name('show');
