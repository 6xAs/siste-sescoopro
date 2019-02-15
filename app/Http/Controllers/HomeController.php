<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date                   = date('Y');
        $dateDay                = date("d/m/y");
        $notice_count           = \SescoopRO\Notice::All()->count();
        $banner_count           = \SescoopRO\Banner::All()->count();
        $transparency_count     = \SescoopRO\Transparency::All()->count();
        $licitacao_count        = \SescoopRO\Licitacoes::All()->count();
        return view('pages-panel.home-panel', compact('date',
        'dateDay', 'notice_count', 'banner_count', 'transparency_count', 'licitacao_count'));
    }

    public function datatable()
    {
        $date = date('Y');
        $dateDay = date("d/m/y");
        return view('pages-panel.datatable', compact('date', 'dateDay'));
    }

    public function testAvatarUpload(Request $request)
   {
       $path = $request->file('avatar')->store('avatars');

        return $path;
   }
}
