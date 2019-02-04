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

    public function edit($id)
    {
        $date = date('Y');
        $banner = \SescoopRO\Banner::find($id);
        return view('pages-panel.bannerdetails', compact('banner', 'date'));
    }

    public function update($id, BannerRequest $request)
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


       DB::table('banners')
            ->where('id',$id)
            ->update(
                ['name' => $name, 'title' => $title, 'link' => $link, 'image' => $fileName_principal]
            );
        File::delete('image-banner/'.$file_principal);

        // Post Message
        $request->session()->flash('message', 'Banner Atualizado com Sucesso');
        return Redirect::to('page-listar-banner');
    }

    public function destroy($id, Request $request)
    {
        $file_principal = DB::table('banners')->value('name', 'image');
        //example it.png, which is located in `public/uploads/masters/logocatagory_Computers` folder
        \SescoopRO\Banner::destroy($id);
        DB::table('banners')->delete($id);
        File::delete('image-banner/'.$file_principal);
        $request->session()->flash('message', 'Banner Excluído com sucesso');
        return Redirect::to('page-listar-banner');

    }
}
