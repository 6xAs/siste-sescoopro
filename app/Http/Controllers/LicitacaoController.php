<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\LicitacaoRequest;
use Illuminate\Support\Facades\Input;
use App\Licitacoes;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class LicitacaoController extends Controller
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
        return view('pages-panel.page-inserir-licitacao', compact('date'));
    }

    public function insert(LicitacaoRequest $request)
    {


        // Validação dos dados
       $number_process                     = $request->input('number_process');
       $modalidade                         = $request->input('modalidade');
       $edital                             = $request->input('edital');
       $objeto                             = $request->input('objeto');
       $status                             = $request->input('status');
       $telefone_fixo                      = $request->input('telefone_fixo');
       $telefone_celular                   = $request->input('telefone_celular');
       $email                              = $request->input('email');
       $hora_abertura                      = $request->input('hora_abertura');
       $data                               = $request->input('data');
       $fileName_01                        = $request->input('file_01');

        if ($request->hasFile('file_01')) {
            $file_01                = $request->file('file_01');
            $fileName_01            = $file_01->getClientOriginalName();

            //Organização dos POSTS file
            $destinationPath                   = 'document-licitacao/';

            // Inserindo
            Input::file('file_01')->move($destinationPath, $fileName_01);
        }

       DB::table('licitacoes')->insert(
           ['number_process' => $number_process, 'modalidade' => $modalidade, 'edital' => $edital,
            'objeto' => $objeto, 'status' => $status, 'telefone_fixo' => $telefone_fixo,
            'telefone_celular' => $telefone_celular, 'email' => $email, 'hora_abertura' => $hora_abertura,
            'data' => $data, 'file_01' => $fileName_01]
       );

       $request->session()->flash('message', 'Documento Inserido com Sucesso');
       return Redirect::to('page-listar-licitacao');


    }

    public function listarTransparency()
    {
        $date = date('Y');
        $licitacao = \SescoopRO\Licitacoes::All();
        return view('pages-panel.page-listar-licitacao', compact('licitacao', 'date'));
    }
}
