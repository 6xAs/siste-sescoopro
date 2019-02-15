<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use SescoopRO\Http\Requests\VideoRequest;
use Illuminate\Http\UploadedFile;
use App\Video;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class VideositeController extends Controller
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
        return view('pages-panel.page-inserir-video', compact('date'));
    }

    public function insert(VideoRequest $request)
    {
        $name                            = $request->input('name');
        $link                           = $request->input('link');

        DB::table('videos')->insert(
            ['name' => $name, 'link' => $link]
        );
        // Post Message
        $request->session()->flash('message', 'Vídeo Inserido com Sucesso');
        return Redirect::to('page-listar-video');
    }

    public function listarVideo()
    {
        $date = date('Y');
        $video = \SescoopRO\Video::All();
        return view('pages-panel.page-listar-video', compact('video', 'date'));
    }

    public function edit($id)
    {
        $date = date('Y');
        $video = \SescoopRO\Video::find($id);
        return view('pages-panel.videodetails', compact('video', 'date'));
    }

    public function update($id, VideoRequest $request)
    {
        $name                            = $request->input('name');
        $link                           = $request->input('link');


       DB::table('videos')
            ->where('id',$id)
            ->update(
                ['name' => $name, 'link' => $link]
            );


        // Post Message
        $request->session()->flash('message', 'Vídeo Atualizado com Sucesso');
        return Redirect::to('page-listar-video');
    }

    public function destroy($id, Request $request)
    {

        \SescoopRO\Video::destroy($id);
        $request->session()->flash('message', 'Vídeo excluído com sucesso');
        return Redirect::to('page-listar-video');
    }

}
