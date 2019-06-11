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
    $evento = \SescoopRO\Galery::orderBy('id','created_at', 'desc')->paginate(3);
    //$notice = \SescoopRO\Notice::orderBy('created_at','DESC');
    $date = date('Y');
    return view('home-site', compact('date', 'banner', 'video', 'noticeDestaque', 'notice', 'evento'));

});

// historia cooperativismo
Route::get('/historia-cooperativismo', function () {

    $date = date('Y');
    return view('pages-site.historia-cooperativismo', compact('date'));
});
// ramos-cooperativismo
Route::get('/ramos-cooperativismo', function () {

    $date = date('Y');
    return view('pages-site.ramos-cooperativismo', compact('date'));
});

// legislacao-cooperativismo
Route::get('/legislacao-cooperativismo', function () {

    $date = date('Y');
    return view('pages-site.legislacao-cooperativismo', compact('date'));
});
// como-funciona-cooperativa
Route::get('/como-funciona-cooperativa', function () {

    $date = date('Y');
    return view('pages-site.como-funciona-cooperativa', compact('date'));
});
// frenecoop
Route::get('/frenecoop', function () {

    $date = date('Y');
    return view('pages-site.frenecoop', compact('date'));
});
// Sistema OCB
Route::get('/sistema-ocb', function () {

    $date = date('Y');
    return view('pages-site.sistema-ocb', compact('date'));
});
// historia-sistema-ocb
Route::get('/historia-sistema-ocb', function () {

    $date = date('Y');
    return view('pages-site.historia-sistema-ocb', compact('date'));
});
// lista-cooperativas
Route::get('/lista-cooperativas', function () {

    $date = date('Y');
    return view('pages-site.lista-cooperativas', compact('date'));
});
// historia-sescoop
Route::get('/historia-sescoop', function () {

    $date = date('Y');
    return view('pages-site.historia-sescoop', compact('date'));
});
// missao-visao
Route::get('/missao-visao', function () {

    $date = date('Y');
    return view('pages-site.missao-visao', compact('date'));
});

// cncoop
Route::get('/cncoop', function () {

    $date = date('Y');
    return view('pages-site.cncoop', compact('date'));
});


// Notices Pages detais
Route::get('notice/{id}/details', ['as' => 'details', function ($id) {
    //

    $notice = \SescoopRO\Notice::find($id);
    $date = date('Y');
    return view('pages-site.viewnoticedetails', compact('notice', 'date'));

    //  $categoria = DB::table('categoria')->lists('nome_categoria','nome_categoria');
}]);

Route::get('/cursos-sescoopro', function () {

    $date = date('Y');
    $curso = \SescoopRO\Curso::orderBy('id','created_at', 'desc')->paginate(10);
    return view('pages-site.page-cursos', compact('curso', 'date'));

});

Route::get('nossoscursos/{id}/details',['as' => 'details', function ($id) {

    $date = date('Y');
    $curso = \SescoopRO\Curso::find($id);
    return view('pages-site.curso-detalhes-sescoop', compact('curso', 'date'));

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
// Encontra licitações no site
Route::post('/find-licitacao', 'SiteController@findLicitacao');



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
// Encontra Transparency
Route::post('/find-transparency', 'SiteController@findTransparency');

Route::get('/ouvidoria', function () {

    $date = date('Y');

    return view('pages-site.ouvidoria', compact('date'));

});
Route::post('post-ouvidoria', 'ContactController@sendContato');

Route::get('/contato-sescoop', function () {

    $date = date('Y');

    return view('pages-site.contato-sescoop', compact('date'));

});
Route::post('post-contato', 'ContactController@sendContato');

Route::get('/noticias-sescoopro', function () {

    $date = date('Y');
    $notice = \SescoopRO\Notice::orderBy('id','created_at', 'desc')->paginate(10);
    return view('pages-site.page-noticeall', compact('notice', 'date'));

});

Route::get('noticedestaque/{id}/details',['as' => 'details', function ($id) {

    $date = date('Y');
    $noticeDestaque = \SescoopRO\DestaqueNotice::find($id);
    return view('pages-site.noticia-destaque-sescoop', compact('noticeDestaque', 'date'));

}]);

// Teste mascara
Route::get('/teste-mascara', function () {

    $date = date('Y');
    return view('exemplo-mascara', compact('date'));
});



// Processo Seletivo Page-Site
Route::get('/processo-seletivo-sescoopro', function () {

    $date = date('Y');
    $proSeletivo = \SescoopRO\ProcessoSeletivo::orderBy('id','created_at', 'desc')->paginate(25);
    return view('pages-site.processo-seletivo', compact('proSeletivo','date'));
});

// Cadastro-Instrutores
Route::get('/cadastro-instrutores', function () {

    $date = date('Y');
    return view('pages-site.cadastramento-instrutores', compact('date'));
});

// Eventos
Route::get('/eventos-sescoopro', function () {

    $date   = date('Y');
    $evento = \SescoopRO\Galery::orderBy('id','created_at', 'desc')->paginate(25);
    return view('pages-site.page-all-eventos', compact('date', 'evento'));
});

// Processo Seletivo Page-Site Details
Route::get('proseletivo/{id}/details', ['as' => 'details', function ($id) {
    //

    $proSeletivo = \SescoopRO\ProcessoSeletivo::find($id);
    $date = date('Y');
    return view('pages-site.proseletivodetails', compact('proSeletivo', 'date'));

    //  $categoria = DB::table('categoria')->lists('nome_categoria','nome_categoria');
}]);

// Processo Seletivo Page-Site
Route::get('/logout', function () {

    return view('auth.login');
});

// Equipe Sescoop
Route::get('/equipe-sescoop', function () {

    $date   = date('Y');
    return view('pages-site.page-nossa-equipe', compact('date'));
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

// ##################  ROUTES OF CURSO ################
Route::get('/page-inserir-curso', 'CursosController@index')->name('page-inserir-curso');
Route::get('/page-listar-curso', 'CursosController@listarCurso')->name('page-listar-curso');
Route::post('/input-curso', 'CursosController@insert');
Route::resource('/curso', 'CursosController');
Route::resource('/curso', 'CursosController');
Route::resource('/deletarcurso', 'CursosController');
Route::get('showcurso/{id}/show', function ($id) {
    $date = date('Y');
    $curso = \SescoopRO\Curso::find($id);
    return view('pages-panel.show-curso', compact('curso', 'date'));
})->name('show');

// ##################  ROUTES OF INSTRUTOR ################
Route::get('/page-inserir-instrutor', 'InstrutorController@index')->name('page-inserir-instrutor');
Route::get('/page-listar-instrutor', 'InstrutorController@listarInstrutor')->name('page-listar-instrutor');
Route::post('/input-instrutor', 'InstrutorController@insert');
Route::resource('/instrutor', 'InstrutorController');
Route::resource('/instrutor', 'InstrutorController');
Route::resource('/deletarinstrutor', 'InstrutorController');
Route::get('showinstrutor/{id}/show', function ($id) {
    $date = date('Y');
    $instrutor = \SescoopRO\Curso::find($id);
    return view('pages-panel.show-instrutor', compact('instrutor', 'date'));
})->name('show');

// ##################  COOPERATIVA ################
Route::get('/page-inserir-cooperativa', 'CooperativasController@index')->name('page-inserir-cooperativa');
Route::post('/input-cooperativa', 'CooperativasController@insert');
Route::get('/page-listar-cooperativa', 'CooperativasController@listarCoop')->name('page-listar-cooperativa');
Route::resource('/cooperativa', 'CooperativasController');
Route::resource('/cooperativa', 'CooperativasController');
Route::resource('/deletarcooperativa', 'CooperativasController');
Route::get('showcooperativa/{id}/show', function ($id) {
    $date = date('Y');
    $cooperativa = \SescoopRO\ListaCoop::find($id);
    return view('pages-panel.show-cooperativa', compact('cooperativa', 'date'));
})->name('show');

// ##################  PROCESSO SELETIVO ################
Route::get('/page-inserir-proSeletivo', 'SeletivoController@index')->name('page-inserir-proSeletivo');
Route::post('/input-proSeletivo', 'SeletivoController@insert');
Route::get('/page-listar-proSeletivo', 'SeletivoController@listarSeletivo')->name('page-listar-proSeletivo');
Route::resource('/proSeletivo', 'SeletivoController');
Route::resource('/proSeletivo', 'SeletivoController');
Route::resource('/deletarproSeletivo', 'SeletivoController');
Route::get('showproSeletivo/{id}/show', function ($id) {
    $date = date('Y');
    $proSeletivo = \SescoopRO\ProcessoSeletivo::find($id);
    return view('pages-panel.showproSeletivo', compact('proSeletivo', 'date'));

})->name('show');

// ##################  IMAGENS EVENTOS ################
Route::get('/page-inserir-evento', 'EventosController@index')->name('page-inserir-evento');
Route::post('/input-evento', 'EventosController@insert');
Route::get('/page-listar-evento', 'EventosController@listarGalery')->name('page-listar-evento');
Route::resource('/evento', 'EventosController');
Route::resource('/evento', 'EventosController');
Route::resource('/deletarevento', 'EventosController');
Route::get('showevento/{id}/show', function ($id) {
    $date = date('Y');
    $evento = \SescoopRO\Galery::find($id);
    return view('pages-site.page-evento', compact('evento', 'date'));

})->name('show');
