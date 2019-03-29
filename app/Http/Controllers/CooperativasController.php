<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\CoopRequest;
use Illuminate\Support\Facades\Input;
use App\ListaCoop;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class CooperativasController extends Controller
{
    //
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
         return view('pages-panel.page-inserir-cooperativa', compact('date'));
     }

     public function insert(CoopRequest $request)
     {

        // Validação dos dados

       $nome_cooperativa                = $request->input('nome_cooperativa');
       $nome_fantasia                   = $request->input('nome_fantasia');
       $cnjp                            = $request->input('cnpj');
       $data_contribuicao               = $request->input('data_contribuicao');
       $numero_registro                 = $request->input('numero_registro');
       $data_registro                   = $request->input('data_registro');
       $numero_cooperados               = $request->input('numero_cooperados');
       $numero_funcionarios             = $request->input('numero_funcionarios');
       $nome_presidente                 = $request->input('nome_presidente');
       $cpf_presidente                  = $request->input('cpf_presidente');
       $cel_presidente                  = $request->input('cel_presidente');
       $rua                             = $request->input('rua');
       $bairro                          = $request->input('bairro');
       $numero                          = $request->input('numero');
       $cep                             = $request->input('cep');
       $telefone_empresarial_1          = $request->input('telefone_empresarial_1');
       $telefone_empresarial_2          = $request->input('telefone_empresarial_2');
       $email                           = $request->input('email');
       $cidade                          = $request->input('cidade');
       $estado                          = $request->input('estado');
       $atividade_economica             = $request->input('atividade_economica');
       $status_cooperativa              = $request->input('status_cooperativa');

       DB::table('lista_coops')->insert(
            [
                'nome_cooperativa' => $nome_cooperativa, 'nome_fantasia' => $nome_fantasia, 'cnpj' => $cnjp, 'data_contribuicao' => $data_contribuicao,
                'numero_registro' => $numero_registro, 'data_registro' => $data_registro, 'numero_cooperados' => $numero_cooperados,
                'numero_funcionarios' => $numero_funcionarios, 'nome_presidente' => $nome_presidente, 'cpf_presidente' => $cpf_presidente,
                'cel_presidente' => $cel_presidente, 'rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, 'cep' => $cep,
                'telefone_empresarial_1' => $telefone_empresarial_1, 'telefone_empresarial_2' => $telefone_empresarial_2, 'email' => $email,
                'cidade' => $cidade, 'estado' => $estado, 'atividade_economica' => $atividade_economica, 'status_cooperativa' => $status_cooperativa

            ]
       );
       // Post Message
       $request->session()->flash('message', 'Cooperativa Cadastrada com Sucesso');
       return Redirect::to('page-listar-cooperativa');


     }

     public function listarCoop()
     {
         $date = date('Y');
         $cooperativa = \SescoopRO\ListaCoop::All();
         return view('pages-panel.page-listar-cooperativa', compact('cooperativa', 'date'));
     }

     public function edit($id)
     {
         $date = date('Y');
         $cooperativa = \SescoopRO\ListaCoop::find($id);
         return view('pages-panel.cooperativadetails', compact('cooperativa', 'date'));
     }

     public function update($id, CoopRequest $request)
     {

         // Validação dos dados

        $nome_cooperativa                = $request->input('nome_cooperativa');
        $cnjp                            = $request->input('cnpj');
        $data_contribuicao               = $request->input('data_contribuicao');
        $numero_registro                 = $request->input('numero_registro');
        $data_registro                   = $request->input('data_registro');
        $numero_cooperados               = $request->input('numero_cooperados');
        $numero_funcionarios             = $request->input('numero_funcionarios');
        $nome_presidente                 = $request->input('nome_presidente');
        $cpf_presidente                  = $request->input('cpf_presidente');
        $cel_presidente                  = $request->input('cel_presidente');
        $rua                             = $request->input('rua');
        $bairro                          = $request->input('bairro');
        $numero                          = $request->input('numero');
        $cep                             = $request->input('cep');
        $telefone_empresarial_1          = $request->input('telefone_empresarial_1');
        $telefone_empresarial_2          = $request->input('telefone_empresarial_2');
        $email                           = $request->input('email');
        $cidade                          = $request->input('cidade');
        $estado                          = $request->input('estado');
        $atividade_economica             = $request->input('atividade_economica');
        $status_cooperativa              = $request->input('status_cooperativa');

        DB::table('lista_coops')
             ->where('id',$id)
             ->update(
                [
                    'nome_cooperativa' => $nome_cooperativa, 'nome_fantasia' => $nome_fantasia, 'cnpj' => $cnjp, 'data_contribuicao' => $data_contribuicao,
                    'numero_registro' => $numero_registro, 'data_registro' => $data_registro, 'numero_cooperados' => $numero_cooperados,
                    'numero_funcionarios' => $numero_funcionarios, 'nome_presidente' => $nome_presidente, 'cpf_presidente' => $cpf_presidente,
                    'cel_presidente' => $cel_presidente, 'rua' => $rua, 'bairro' => $bairro, 'numero' => $numero, 'cep' => $cep,
                    'telefone_empresarial_1' => $telefone_empresarial_1, 'telefone_empresarial_2' => $telefone_empresarial_2, 'email' => $email,
                    'cidade' => $cidade, 'estado' => $estado, 'atividade_economica' => $atividade_economica, 'status_cooperativa' => $status_cooperativa


                ]
             );


         // Post Message
         $request->session()->flash('message', 'Cooperativa Atualizada com Sucesso');
         return Redirect::to('page-listar-cooperativa');
     }

     public function destroy($id, Request $request)
     {
         \SescoopRO\ListaCoop::destroy($id);
         $request->session()->flash('message', 'Cooperativa excluída com sucesso');
         return Redirect::to('page-listar-cooperativa');
     }
}
