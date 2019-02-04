<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Input;
use App\Banner;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class BannerController extends Controller
{

    public function index()
    {
        $date = date('Y');
        return view('pages-panel.page-inserir-banner', compact('date'));
    }

    public function insert(BannerRequest $request)
    {
        // Insert DB
        $file_principal                 = Input::file('image');
        $destinationPath                = 'images-banner/';
        $fileName_principal             = $file_principal->getClientOriginalName();
        Input::file('image')->move($destinationPath, $fileName_principal);

        // Validação dos dados
       $name                            = $request->input('name');
       $title                           = $request->input('title');
       $link                            = $request->input('link');
       $image                           = $request->file('image');
       DB::table('banners')->insert(
           ['name' => $name, 'title' => $title, 'link' => $link, 'image' => $fileName_principal]
       );
       // Post Message
       $request->session()->flash('message', 'Banner Inserido com Sucesso');
       return Redirect::to('page-listar-banner');
    }

    public function listarBanner()
    {
        $date = date('Y');
        $banner = \SescoopRO\Banner::All();
        return view('pages-panel.page-listar-banner', compact('banner', 'date'));
    }
}
