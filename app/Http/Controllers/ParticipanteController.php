<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\PartRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\Participante;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class ParticipanteController extends Controller
{

    public function index()
    {
        $date = date('Y');
        return view('pages-participante.home-participante', compact('date'));
    }


    public function insert(PartRequest $request)
    {

        // Validação dos dados
       $nome                      = $request->input('nome');
       $email                     = $request->input('email');
       $password                  = $request->input('password');


       DB::table('participantes')->insert(
           [
               'nome' => $nome, 'email' => $email, 'password' => $password
            ]
       );
       // Post Message
       //$request->session()->flash('message', 'Documento Inserido com Sucesso');
       return Redirect::to('home-participante');
    }

    public function listarParticipante()
    {
        $date = date('Y');
        $transparency = \SescoopRO\Participante::All();
        return view('pages-panel.page-listar-transparency', compact('transparency', 'date'));
    }

    public function edit($id)
    {
        $date = date('Y');
        $transparency = \SescoopRO\Participante::find($id);
        return view('pages-panel.transparencydetails', compact('transparency', 'date'));
    }

    public function update($id, TranspRequest $request)
    {

        // Organização dos POSTS imagens
        $file_01                     = Input::file('file_01');
        $file_02                     = Input::file('file_02');
        $file_03                     = Input::file('file_03');

        // Destino das imagens
        $destinationPath             = 'document-transparency/';

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
       $nome                      = $request->input('nome');
       $email                       = $request->input('email');
       $password                = $request->input('password');
       $ano                          = $request->input('ano');

       // Deletando arquivos existentes na pasta
       File::delete('document-transparency/'.$file_01);
       File::delete('document-transparency/'.$file_02);
       File::delete('document-transparency/'.$file_03);

       DB::table('participantes')
            ->where('id',$id)
            ->update(
                ['nome' => $nome, 'email' => $email, 'password' => $password,
                 'ano' => $ano, 'file_01' => $fileName_01, 'file_02' => $fileName_02, 'file_03' => $fileName_03]
            );


        // Post Message
        $request->session()->flash('message', 'Documento Atualizado com Sucesso');
        return Redirect::to('page-listar-transparency');
    }

    public function destroy($id, Request $request)
    {
        // Apagando arquivos existente
        $file_01                = DB::table('participantes')->where('id',$id)->value('file_01');

        // Deletando arquivos existentes na pasta
        File::delete('document-transparency/'.$file_01);

        \SescoopRO\Participante::destroy($id);
        $request->session()->flash('message', 'Documento excluído com sucesso');
        return Redirect::to('page-listar-transparency');


    }
}
