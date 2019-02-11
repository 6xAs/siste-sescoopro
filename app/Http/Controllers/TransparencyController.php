<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\TranspRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\Transparency;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class TransparencyController extends Controller
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
        return view('pages-panel.page-inserir-transparency', compact('date'));
    }

    public function insert(TranspRequest $request)
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
        if ($request->hasFile('file_02')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_02            = $file_02->getClientOriginalName();
            Input::file('file_02')->move($destinationPath, $fileName_02);
        }
        if ($request->hasFile('file_03')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_03            = $file_03->getClientOriginalName();
            Input::file('file_03')->move($destinationPath, $fileName_03);
        }


        // Validação dos dados
       $docMain                      = $request->input('docMain');
       $subDoc                       = $request->input('subDoc');
       $document_name                = $request->input('document_name');
       $ano                          = $request->input('ano');

       DB::table('transparencies')->insert(
           ['docMain' => $docMain, 'subDoc' => $subDoc, 'document_name' => $document_name,
            'ano' => $ano, 'file_01' => $fileName_01, 'file_02' => $fileName_02, 'file_03' => $fileName_03]
       );
       // Post Message
       $request->session()->flash('message', 'Documento Inserido com Sucesso');
       return Redirect::to('page-listar-transparency');
    }

    public function listarTransparency()
    {
        $date = date('Y');
        $transparency = \SescoopRO\Transparency::All();
        return view('pages-panel.page-listar-transparency', compact('transparency', 'date'));
    }

    public function edit($id)
    {
        $date = date('Y');
        $transparency = \SescoopRO\Transparency::find($id);
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
        if ($request->hasFile('file_02')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_02            = $file_02->getClientOriginalName();
            Input::file('file_02')->move($destinationPath, $fileName_02);
        }
        if ($request->hasFile('file_03')) {

            // Pegando nome do arquivo e inserindo na pasta
            $fileName_03            = $file_03->getClientOriginalName();
            Input::file('file_03')->move($destinationPath, $fileName_03);
        }


        // Validação dos dados
       $docMain                      = $request->input('docMain');
       $subDoc                       = $request->input('subDoc');
       $document_name                = $request->input('document_name');
       $ano                          = $request->input('ano');



       DB::table('transparencies')
            ->where('id',$id)
            ->update(
                ['docMain' => $docMain, 'subDoc' => $subDoc, 'document_name' => $document_name,
                 'ano' => $ano, 'file_01' => $fileName_01, 'file_02' => $fileName_02, 'file_03' => $fileName_03]
            );


        // Post Message
        $request->session()->flash('message', 'Documento Atualizado com Sucesso');
        return Redirect::to('page-listar-transparency');
    }

    public function destroy($id, Request $request)
    {
        // Apagando arquivos existente
        $file_01                = DB::table('transparencies')->where('id',$id)->value('file_01');

        // Deletando arquivos existentes na pasta
        File::delete('document-transparency/'.$file_01);

        \SescoopRO\Transparency::destroy($id);
        $request->session()->flash('message', 'Documento excluído com sucesso');
        return Redirect::to('page-listar-transparency');


    }


}
