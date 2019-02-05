<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\NoticeRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\Notice;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class NoticeController extends Controller
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
        return view('pages-panel.page-inserir-notice', compact('date'));
    }

    public function insert(NoticeRequest $request)
    {
        // Organização dos POSTS imagens
        $file_principal                    = Input::file('image_01');
        $image_02                          = Input::file('image_02');
        $image_03                          = Input::file('image_03');
        $destinationPath                   = 'images-notices/';
        $fileName_principal                = $file_principal->getClientOriginalName();
        $fileName_principal_02             = $image_02->getClientOriginalName();
        $fileName_principal_03             = $image_03->getClientOriginalName();

        // Inserindo
        Input::file('image_01')->move($destinationPath, $fileName_principal);
        Input::file('image_02')->move($destinationPath, $fileName_principal_02);
        Input::file('image_03')->move($destinationPath, $fileName_principal_03);


        // Validação dos dados
       $title                              = $request->input('title');
       $subtitle                           = $request->input('subtitle');
       $editoria                           = $request->input('editoria');
       $data                               = $request->input('data');
       $description                        = $request->input('description');
       $video                              = $request->input('video');

       $user_id = \SescoopRO\User::find($id);
       DB::table('notices')->insert(
           ['title' => $title, 'subtitle' => $subtitle, 'editoria' => $editoria,
            'data' => $data, 'description' => $description, 'video' => $video,
             'image_01' => $fileName_principal, 'image_02' => $fileName_principal_02, 'image_03' => $fileName_principal_03, $user_id]
       );
       // Post Message
       $request->session()->flash('message', 'Notícia Inserida com Sucesso');
       return Redirect::to('page-listar-notice');
    }


    public function listarNotice()
    {
        $date = date('Y');
        $notice = \SescoopRO\Notice::All();
        return view('pages-panel.page-listar-notice', compact('notice', 'date'));
    }


    public function edit($id)
    {
        $date = date('Y');
        $notice = \SescoopRO\Notice::find($id);
        return view('pages-panel.noticedetails', compact('notice', 'date'));
    }


    public function update(Request $request, $id)
    {
        // Insert DB
        $file_principal                    = Input::file('image_01');
        $image_02                          = Input::file('image_02');
        $image_03                          = Input::file('image_03');
        $destinationPath                   = 'images-banner/';


        $fileName_principal                = $file_principal->getClientOriginalName();
        $fileName_principal_02             = $image_02->getClientOriginalName();
        $fileName_principal_03             = $image_03->getClientOriginalName();


        // Inserindo
        Input::file('image_01')->move($destinationPath, $fileName_principal);
        Input::file('image_02')->move($destinationPath, $fileName_principal_02);
        Input::file('image_03')->move($destinationPath, $fileName_principal_03);


        // Validação dos dados
       $title                              = $request->input('title');
       $subtitle                           = $request->input('subtitle');
       $editoria                           = $request->input('editoria');
       $data                               = $request->input('data');
       $description                        = $request->input('description');
       $video                              = $request->input('video');


       DB::table('notices')
            ->where('id',$id)
            ->update(
                ['title' => $title, 'subtitle' => $subtitle, 'editoria' => $editoria,
                 'data' => $data, 'description' => $description, 'video' => $video,
                 'image_01' => $fileName_principal, 'image_02' => $fileName_principal_02, 'image_03' => $fileName_principal_03]
            );


        // Post Message
        $request->session()->flash('message', 'Notícia Atualizada com Sucesso');
        return Redirect::to('page-listar-notice');
    }


    public function destroy($id, Request $request)
    {
        $file_principal         = DB::table('notices')->value('name','image_01');

        //example it.png, which is located in `public/uploads/masters/logocatagory_Computers` folder
        \SescoopRO\Notice::destroy($id);
        DB::table('notices')->delete($id);
        File::delete('image-notices/'.$file_principal);
        $request->session()->flash('message', 'Notícia excluída com sucesso');
        return Redirect::to('page-listar-notice');
    }
}
