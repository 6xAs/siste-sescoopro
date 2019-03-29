<?php

namespace SescoopRO\Http\Controllers;


use Illuminate\Http\Request;
use SescoopRO\Http\Requests\InstrutorRequest;
use Illuminate\Support\Facades\Input;
use App\Instructor;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class InstrutorController extends Controller
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
         return view('pages-panel.page-inserir-instrutor', compact('date'));
     }

     public function insert(InstrutorRequest $request)
     {


        // Validação dos dados
       $name                            = $request->input('name');
       $email                           = $request->input('email');
       $data_nascimento                 = $request->input('data_nascimento');
       $sexo                            = $request->input('sexo');
       $estado_civil                    = $request->input('estado_civil');
       $rua                             = $request->input('rua');
       $bairro                          = $request->input('bairro');
       $number                          = $request->input('number');
       $objetivo                        = $request->input('objetivo');
       $experiency                      = $request->input('experiency');
       $formation                       = $request->input('formation');
       $idiomas                         = $request->input('idiomas');
       $informatica                     = $request->input('informatica');

       DB::table('instructors')->insert(
            [
               'name'  => $name, 'email' => $email, 'data_nascimento' => $data_nascimento,
                'sexo' => $sexo, 'estado_civil' => $estado_civil, 'rua' => $rua,
                'bairro' => $bairro, 'number' => $number, 'objetivo' => $objetivo,
                'experiency' => $experiency, 'formation' => $formation, 'idiomas' => $idiomas,
                'informatica' => $informatica
            ]
       );
       // Post Message
       $request->session()->flash('message', 'Instrutor Cadastrado com Sucesso');
       return Redirect::to('page-listar-instrutor');

        $instrutor->save();
        // Post Message
        $request->session()->flash('message', 'Instrutor Cadastrado com Sucesso');
        return Redirect::to('page-listar-instrutor');
     }

     public function listarInstrutor()
     {
         $date = date('Y');
         $instrutor = \SescoopRO\Instructor::All();
         return view('pages-panel.page-listar-instrutor', compact('instrutor', 'date'));
     }

     public function edit($id)
     {
         $date = date('Y');
         $instrutor = \SescoopRO\Instructor::find($id);
         return view('pages-panel.instrutordetails', compact('instrutor', 'date'));
     }

     public function update($id, InstrutorRequest $request)
     {

         // Validação dos dados
        $name                            = $request->input('name');
        $email                           = $request->input('email');
        $data_nascimento                 = $request->input('data_nascimento');
        $sexo                            = $request->input('sexo');
        $estado_civil                    = $request->input('estado_civil');
        $rua                             = $request->input('rua');
        $bairro                          = $request->input('bairro');
        $number                          = $request->input('number');
        $objetivo                        = $request->input('objetivo');
        $experiency                      = $request->input('experiency');
        $formation                       = $request->input('formation');
        $idiomas                         = $request->input('idiomas');
        $informatica                     = $request->input('informatica');

        DB::table('instructors')
             ->where('id',$id)
             ->update(
                [
                    'name'  => $name, 'email' => $email, 'data_nascimento' => $data_nascimento,
                     'sexo' => $sexo, 'estado_civil' => $estado_civil, 'rua' => $rua,
                     'bairro' => $bairro, 'number' => $number, 'objetivo' => $objetivo,
                     'experiency' => $experiency, 'formation' => $formation, 'idiomas' => $idiomas,
                     'informatica' => $informatica

                ]
             );


         // Post Message
         $request->session()->flash('message', 'Instrutor Atualizado com Sucesso');
         return Redirect::to('page-listar-instrutor');
     }

     public function destroy($id, Request $request)
     {
         \SescoopRO\Instrutor::destroy($id);
         $request->session()->flash('message', 'Instrutor excluído com sucesso');
         return Redirect::to('page-listar-instrutor');
     }
}
