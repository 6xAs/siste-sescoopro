<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\EventosRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\Galery;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class EventosController extends Controller
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

        return view('pages-panel.page-inserir-evento', compact('date'));
    }

    public function insert(EventosRequest $request)
    {

        // Destino do arquivo
        $destinationPath                   = 'images-eventos/';

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
        // Verificando se existe arquivo
        if ($request->hasFile('image_04')) {

            $image_04 = $request->file('image_04');
            $fileName_principal_04                = $image_04->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_04')->move($destinationPath, $fileName_principal_04);
        }
        else{
            $fileName_principal_04                = $request->input('image_04');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_05')) {

            $image_05 = $request->file('image_05');
            $fileName_principal_05                = $image_05->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_05')->move($destinationPath, $fileName_principal_05);
        }
        else{
            $fileName_principal_05                = $request->input('image_05');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_06')) {

            $image_06 = $request->file('image_06');
            $fileName_principal_06                = $image_06->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_06')->move($destinationPath, $fileName_principal_06);
        }
        else{
            $fileName_principal_06                = $request->input('image_06');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_07')) {

            $image_07 = $request->file('image_07');
            $fileName_principal_07                = $image_07->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_07')->move($destinationPath, $fileName_principal_07);
        }
        else{
            $fileName_principal_07                = $request->input('image_07');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_08')) {

            $image_08 = $request->file('image_08');
            $fileName_principal_08                = $image_08->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_08')->move($destinationPath, $fileName_principal_08);
        }
        else{
            $fileName_principal_08                = $request->input('image_08');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_09')) {

            $image_09 = $request->file('image_09');
            $fileName_principal_09                = $image_09->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_09')->move($destinationPath, $fileName_principal_09);
        }
        else{
            $fileName_principal_09                = $request->input('image_09');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_010')) {

            $image_010 = $request->file('image_010');
            $fileName_principal_010                = $image_010->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_010')->move($destinationPath, $fileName_principal_010);
        }
        else{
            $fileName_principal_010                = $request->input('image_010');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_011')) {

            $image_011 = $request->file('image_011');
            $fileName_principal_011                = $image_011->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_011')->move($destinationPath, $fileName_principal_011);
        }
        else{
            $fileName_principal_011                = $request->input('image_011');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_012')) {

            $image_012 = $request->file('image_012');
            $fileName_principal_012                = $image_012->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_012')->move($destinationPath, $fileName_principal_012);
        }
        else{
            $fileName_principal_012                = $request->input('image_012');
        }

        // Validação dos dados
       $title                              = $request->input('title');
       $data                               = $request->input('data');
       $description                        = $request->input('description');
       $local                              = $request->input('local');


       DB::table('galeries')->insert(
            [
                'title' => $title, 'data' => $data, 'description' => $description, 'local' => $local,

                'image_01' => $fileName_principal, 'image_02' => $fileName_principal_02, 'image_03' => $fileName_principal_03,
                'image_04' => $fileName_principal_04, 'image_05' => $fileName_principal_05, 'image_06' => $fileName_principal_06,
                'image_07' => $fileName_principal_07, 'image_08' => $fileName_principal_08, 'image_09' => $fileName_principal_09,
                'image_010' => $fileName_principal_010, 'image_011' => $fileName_principal_011, 'image_012' => $fileName_principal_012
            ]
            );
       // Post Message
       $request->session()->flash('message', 'Evento Inserido com Sucesso');
       return Redirect::to('page-listar-evento');
    }


    public function listarGalery()
    {
        $date = date('Y');
        $evento = \SescoopRO\Galery::All();
        return view('pages-panel.page-listar-evento', compact('evento', 'date'));
    }


    public function edit($id)
    {
        $date = date('Y');
        $evento = \SescoopRO\Galery::find($id);
        return view('pages-panel.eventodetails', compact('evento', 'date'));
    }

    public function update(Request $request, $id)
    {
        // Destino do arquivo
        $destinationPath                   = 'images-eventos/';

        // Apagando arquivos existente
        $fileName_principal                 = DB::table('galeries')->where('id',$id)->value('image_01');
        $fileName_principal_02              = DB::table('galeries')->where('id',$id)->value('image_02');
        $fileName_principal_03              = DB::table('galeries')->where('id',$id)->value('image_03');
        $fileName_principal_04              = DB::table('galeries')->where('id',$id)->value('image_04');
        $fileName_principal_05              = DB::table('galeries')->where('id',$id)->value('image_05');
        $fileName_principal_06              = DB::table('galeries')->where('id',$id)->value('image_06');
        $fileName_principal_07              = DB::table('galeries')->where('id',$id)->value('image_07');
        $fileName_principal_08              = DB::table('galeries')->where('id',$id)->value('image_08');
        $fileName_principal_09              = DB::table('galeries')->where('id',$id)->value('image_09');
        $fileName_principal_010              = DB::table('galeries')->where('id',$id)->value('image_010');
        $fileName_principal_011              = DB::table('galeries')->where('id',$id)->value('image_011');
        $fileName_principal_012              = DB::table('galeries')->where('id',$id)->value('image_012');
        // Deletando arquivos existentes na pasta
        File::delete('images-eventos/'.$fileName_principal);
        File::delete('images-eventos/'.$fileName_principal_02);
        File::delete('images-eventos/'.$fileName_principal_03);
        File::delete('images-eventos/'.$fileName_principal_04);
        File::delete('images-eventos/'.$fileName_principal_05);
        File::delete('images-eventos/'.$fileName_principal_06);
        File::delete('images-eventos/'.$fileName_principal_07);
        File::delete('images-eventos/'.$fileName_principal_08);
        File::delete('images-eventos/'.$fileName_principal_09);
        File::delete('images-eventos/'.$fileName_principal_010);
        File::delete('images-eventos/'.$fileName_principal_011);
        File::delete('images-eventos/'.$fileName_principal_012);


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
        // Verificando se existe arquivo
        if ($request->hasFile('image_04')) {

            $image_04 = $request->file('image_04');
            $fileName_principal_04                = $image_04->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_04')->move($destinationPath, $fileName_principal_04);
        }
        else{
            $fileName_principal_04                = $request->input('image_04');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_05')) {

            $image_05 = $request->file('image_05');
            $fileName_principal_05                = $image_05->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_05')->move($destinationPath, $fileName_principal_05);
        }
        else{
            $fileName_principal_05                = $request->input('image_05');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_06')) {

            $image_06 = $request->file('image_06');
            $fileName_principal_06                = $image_06->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_06')->move($destinationPath, $fileName_principal_06);
        }
        else{
            $fileName_principal_06                = $request->input('image_06');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_07')) {

            $image_07 = $request->file('image_07');
            $fileName_principal_07                = $image_07->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_07')->move($destinationPath, $fileName_principal_07);
        }
        else{
            $fileName_principal_07                = $request->input('image_07');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_08')) {

            $image_08 = $request->file('image_08');
            $fileName_principal_08                = $image_08->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_08')->move($destinationPath, $fileName_principal_08);
        }
        else{
            $fileName_principal_08                = $request->input('image_08');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_09')) {

            $image_09 = $request->file('image_09');
            $fileName_principal_09                = $image_09->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_09')->move($destinationPath, $fileName_principal_09);
        }
        else{
            $fileName_principal_09                = $request->input('image_09');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_010')) {

            $image_010 = $request->file('image_010');
            $fileName_principal_010                = $image_010->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_010')->move($destinationPath, $fileName_principal_010);
        }
        else{
            $fileName_principal_010                = $request->input('image_010');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_011')) {

            $image_011 = $request->file('image_011');
            $fileName_principal_011                = $image_011->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_011')->move($destinationPath, $fileName_principal_011);
        }
        else{
            $fileName_principal_011                = $request->input('image_011');
        }
        // Verificando se existe arquivo
        if ($request->hasFile('image_012')) {

            $image_012 = $request->file('image_012');
            $fileName_principal_012                = $image_012->getClientOriginalName();
            // Inserindo na pasta
            Input::file('image_012')->move($destinationPath, $fileName_principal_012);
        }
        else{
            $fileName_principal_012                = $request->input('image_012');
        }

        // Validação dos dados
       $title                              = $request->input('title');
       $data                               = $request->input('data');
       $description                        = $request->input('description');
       $local                              = $request->input('local');


       DB::table('galeries')
            ->where('id',$id)
            ->update(
                [
                    'title' => $title, 'data' => $data, 'description' => $description, 'local' => $local,

                    'image_01' => $fileName_principal, 'image_02' => $fileName_principal_02, 'image_03' => $fileName_principal_03,
                    'image_04' => $fileName_principal_04, 'image_05' => $fileName_principal_05, 'image_06' => $fileName_principal_06,
                    'image_07' => $fileName_principal_07, 'image_08' => $fileName_principal_08, 'image_09' => $fileName_principal_09,
                    'image_010' => $fileName_principal_010, 'image_011' => $fileName_principal_011, 'image_012' => $fileName_principal_012
                ]
            );


        // Post Message
        $request->session()->flash('message', 'Evento Atualizado com Sucesso');
        return Redirect::to('page-listar-evento');
    }


    public function destroy($id, Request $request)
    {

        // Apagando arquivos existente
        $file_principal                     = DB::table('galeries')->where('id',$id)->value('image_01');
        File::delete('images-eventos/'.$file_principal);
        $fileName_principal_02              = DB::table('galeries')->where('id',$id)->value('image_02');
        File::delete('images-eventos/'.$fileName_principal_02);
        $fileName_principal_03              = DB::table('galeries')->where('id',$id)->value('image_03');
        File::delete('images-eventos/'.$fileName_principal_03);
        $fileName_principal_04              = DB::table('galeries')->where('id',$id)->value('image_04');
        File::delete('images-eventos/'.$fileName_principal_04);
        $fileName_principal_05              = DB::table('galeries')->where('id',$id)->value('image_05');
        File::delete('images-eventos/'.$fileName_principal_05);
        $fileName_principal_06              = DB::table('galeries')->where('id',$id)->value('image_06');
        File::delete('images-eventos/'.$fileName_principal_06);
        $fileName_principal_07              = DB::table('galeries')->where('id',$id)->value('image_07');
        File::delete('images-eventos/'.$fileName_principal_07);
        $fileName_principal_08              = DB::table('galeries')->where('id',$id)->value('image_08');
        File::delete('images-eventos/'.$fileName_principal_08);
        $fileName_principal_09              = DB::table('galeries')->where('id',$id)->value('image_09');
        File::delete('images-eventos/'.$fileName_principal_09);
        $fileName_principal_010              = DB::table('galeries')->where('id',$id)->value('image_010');
        File::delete('images-eventos/'.$fileName_principal_010);
        $fileName_principal_011              = DB::table('galeries')->where('id',$id)->value('image_011');
        File::delete('images-eventos/'.$fileName_principal_011);
        $fileName_principal_012              = DB::table('galeries')->where('id',$id)->value('image_012');
        File::delete('images-eventos/'.$fileName_principal_012);

        \SescoopRO\Galery::destroy($id);
        $request->session()->flash('message', 'Evento excluído com sucesso');
        return Redirect::to('page-listar-evento');
    }
}
