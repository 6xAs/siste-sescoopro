<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\NoticeRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\DestaqueNotice;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class NoticeDestaqueController extends Controller
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
        return view('pages-panel.page-inserir-noticedestaque', compact('date'));
    }

    public function insert(NoticeRequest $request)
    {

        // Destino do arquivo

        $destinationPath                   = 'images-destaque_notices/';

        // Verificando se existe arquivo
        if ($request->hasFile('image_01')) {

            $file_principal = $request->file('image_01');
            $fileName_principal                = $file_principal->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_01')->move($destinationPath, $fileName_principal);
        }
        else{
            $fileName_principal                = $request->input('image_01');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_02')) {

            $image_02 = $request->file('image_02');
            $fileName_principal_02                = $image_02->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_02')->move($destinationPath, $fileName_principal_02);
        }
        else{
            $fileName_principal_02                = $request->input('image_02');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_03')) {

            $image_03 = $request->file('image_03');
            $fileName_principal_03                = $image_03->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_03')->move($destinationPath, $fileName_principal_03);
        }
        else{
            $fileName_principal_03                = $request->input('image_03');
        }
        // Validação dos dados
       $title                              = $request->input('title');
       $subtitle                           = $request->input('subtitle');
       $editoria                           = $request->input('editoria');
       $data                               = $request->input('data');
       $description                        = $request->input('description');
       $video                              = $request->input('video');


       DB::table('destaque_notices')->insert(
           ['title' => $title, 'subtitle' => $subtitle, 'editoria' => $editoria,
            'data' => $data, 'description' => $description, 'video' => $video,
            'image_01' => $fileName_principal, 'image_02' => $fileName_principal_02, 'image_03' => $fileName_principal_03]
       );
       // Post Message
       $request->session()->flash('message', 'Notícia Inserida com Sucesso');
       return Redirect::to('page-listar-noticedestaque');
    }


    public function listarNotice()
    {
        $date = date('Y');
        $noticeDestaque = \SescoopRO\DestaqueNotice::All();
        return view('pages-panel.page-listar-noticedestaque', compact('noticeDestaque', 'date'));
    }


    public function edit($id)
    {
        $date = date('Y');
        $noticeDestaque = \SescoopRO\DestaqueNotice::find($id);
        return view('pages-panel.destaquedetails', compact('noticeDestaque', 'date'));
    }


    public function update(Request $request, $id)
    {
        // Destino do arquivo

        $destinationPath                   = 'images-destaque_notices/';

        // Verificando se existe arquivo
        if ($request->hasFile('image_01')) {

            $file_principal = $request->file('image_01');
            $fileName_principal                = $file_principal->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_01')->move($destinationPath, $fileName_principal);
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_02')) {

            $image_02 = $request->file('image_02');
            $fileName_principal_02                = $image_02->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_02')->move($destinationPath, $fileName_principal_02);
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_03')) {

            $image_03 = $request->file('image_03');
            $fileName_principal_03                = $image_03->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_03')->move($destinationPath, $fileName_principal_03);
        }

       // Apagando arquivos existente
       $file_principal                     = DB::table('destaque_notices')->where('id',$id)->value('image_01');
       $fileName_principal_02              = DB::table('destaque_notices')->where('id',$id)->value('image_02');
       $fileName_principal_03              = DB::table('destaque_notices')->where('id',$id)->value('image_03');
       // Deletando arquivos existentes na pasta
       File::delete('images-destaque_notices/'.$file_principal);
       File::delete('images-destaque_notices/'.$fileName_principal_02);
       File::delete('images-destaque_notices/'.$fileName_principal_03);

       // Validação dos dados
      $title                              = $request->input('title');
      $subtitle                           = $request->input('subtitle');
      $editoria                           = $request->input('editoria');
      $data                               = $request->input('data');
      $description                        = $request->input('description');
      $video                              = $request->input('video');

       DB::table('destaque_notices')
            ->where('id',$id)
            ->update(
                ['title' => $title, 'subtitle' => $subtitle, 'editoria' => $editoria,
                 'data' => $data, 'description' => $description, 'video' => $video,
                 'image_01' => $fileName_principal, 'image_02' => $fileName_principal_02, 'image_03' => $fileName_principal_03]
            );


        // Post Message
        $request->session()->flash('message', 'Notícia Atualizada com Sucesso');
        return Redirect::to('page-listar-noticedestaque');
    }


    public function destroy($id, Request $request)
    {

        // Apagando arquivos existente
        $file_principal                     = DB::table('destaque_notices')->where('id',$id)->value('image_01');
        $fileName_principal_02              = DB::table('destaque_notices')->where('id',$id)->value('image_02');
        $fileName_principal_03              = DB::table('destaque_notices')->where('id',$id)->value('image_03');
        // Deletando arquivos existentes na pasta
        File::delete('images-destaque_notices/'.$file_principal);
        File::delete('images-destaque_notices/'.$fileName_principal_02);
        File::delete('images-destaque_notices/'.$fileName_principal_03);
        \SescoopRO\DestaqueNotice::destroy($id);
        $request->session()->flash('message', 'Notícia excluída com sucesso');
        return Redirect::to('page-listar-noticedestaque');
    }
}
