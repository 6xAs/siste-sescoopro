<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\SeletivoRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\ProcessoSeletivo;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class SeletivoController extends Controller
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
        return view('pages-panel.page-inserir-proSeletivo', compact('date'));
    }

    public function insert(SeletivoRequest $request)
    {
        // Organização dos POSTS imagens
        $file_01                     = Input::file('file_01');
        $file_02                     = Input::file('file_02');
        $file_03                     = Input::file('file_03');

        // Destino das imagens
        $destinationPath             = 'processo-seletivo/';

        if ($request->hasFile('file_01')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_01            = $file_01->getClientOriginalName();
            Input::file('file_01')->move($destinationPath, $fileName_01);
        }
        else {
             $fileName_01           = $request->input('file_01');
        }
        if ($request->hasFile('file_02')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_02            = $file_02->getClientOriginalName();
            Input::file('file_02')->move($destinationPath, $fileName_02);
        }
        else {
             $fileName_02          = $request->input('file_02');
        }
        if ($request->hasFile('file_03')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_03            = $file_03->getClientOriginalName();
            Input::file('file_03')->move($destinationPath, $fileName_03);
        }
        else {
             $fileName_03           = $request->input('file_03');
        }


        // Validação dos dados
       $number_edital                      = $request->input('number_edital');
       $title                              = $request->input('title');
       $subtitle                           = $request->input('subtitle');
       $observacao                         = $request->input('observacao');
       $data                               = $request->input('data');

       DB::table('processo_seletivos')->insert(
           [
                'number_edital' => $number_edital, 'title' => $title, 'subtitle' => $subtitle,
                'observacao' => $observacao, 'data' => $data,
                'file_01' => $fileName_01, 'file_02' => $fileName_02, 'file_03' => $fileName_03
           ]

       );
       // Post Message
       $request->session()->flash('message', 'Informação Inserida com Sucesso');
       return Redirect::to('page-listar-proSeletivo');
    }

    public function listarSeletivo()
    {
        $date = date('Y');
        $proSeletivo = \SescoopRO\ProcessoSeletivo::All();
        return view('pages-panel.page-listar-proSeletivo', compact('proSeletivo', 'date'));
    }

    public function edit($id)
    {
        $date = date('Y');
        $proSeletivo = \SescoopRO\ProcessoSeletivo::find($id);
        return view('pages-panel.seletivodetails', compact('proSeletivo', 'date'));
    }

    public function update($id, SeletivoRequest $request)
    {

        // Organização dos POSTS imagens
        $file_01                     = Input::file('file_01');
        $file_02                     = Input::file('file_02');
        $file_03                     = Input::file('file_03');

        // Destino das imagens
        $destinationPath             = 'processo-seletivo/';

        if ($request->hasFile('file_01')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_01            = $file_01->getClientOriginalName();
            Input::file('file_01')->move($destinationPath, $fileName_01);
        }
        else {
             $fileName_01           = $request->input('file_01');
        }
        if ($request->hasFile('file_02')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_02            = $file_02->getClientOriginalName();
            Input::file('file_02')->move($destinationPath, $fileName_02);
        }
        else {
             $fileName_02           = $request->input('file_02');
        }
        if ($request->hasFile('file_03')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_03            = $file_03->getClientOriginalName();
            Input::file('file_03')->move($destinationPath, $fileName_03);
        }
        else {
             $fileName_03           = $request->input('file_03');
        }


        // Validação dos dados
       $number_edital                      = $request->input('number_edital');
       $title                              = $request->input('title');
       $subtitle                           = $request->input('subtitle');
       $observacao                         = $request->input('observacao');
       $data                               = $request->input('data');

       // Apagando arquivos existente
       $file_01                = DB::table('processo_seletivos')->where('id',$id)->value('file_01');
       $file_02                = DB::table('processo_seletivos')->where('id',$id)->value('file_02');
       $file_03                = DB::table('processo_seletivos')->where('id',$id)->value('file_03');

       // Deletando arquivos existentes na pasta
       File::delete('processo-seletivo/'.$file_01);
       File::delete('processo-seletivo/'.$file_02);
       File::delete('processo-seletivo/'.$file_03);

       DB::table('processo_seletivos')
            ->where('id',$id)
            ->update(
                [
                    'number_edital' => $number_edital, 'title' => $title, 'subtitle' => $subtitle,
                    'observacao' => $observacao, 'data' => $data,'file_01' => $fileName_01, 'file_02' => $fileName_02, 'file_03' => $fileName_03
                ]
            );

        // Post Message
        $request->session()->flash('message', 'Documento Atualizado com Sucesso');
        return Redirect::to('page-listar-proSeletivo');
    }

    public function destroy($id, Request $request)
    {
        // Apagando arquivos existente
        $file_01                = DB::table('processo_seletivos')->where('id',$id)->value('file_01');
        $file_02                = DB::table('processo_seletivos')->where('id',$id)->value('file_02');
        $file_03                = DB::table('processo_seletivos')->where('id',$id)->value('file_03');

        // Deletando arquivos existentes na pasta
        File::delete('processo-seletivo/'.$file_01);
        File::delete('processo-seletivo/'.$file_02);
        File::delete('processo-seletivo/'.$file_03);

        \SescoopRO\ProcessoSeletivo::destroy($id);
        $request->session()->flash('message', 'Documento excluído com sucesso');
        return Redirect::to('page-listar-proSeletivo');


    }

}
