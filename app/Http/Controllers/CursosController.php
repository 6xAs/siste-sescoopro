<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use SescoopRO\Http\Requests\CursoRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\Curso;
use App\Instructor;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class CursosController extends Controller
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
      $instrutor = \SescoopRO\Instructor::All();
      return view('pages-panel.page-inserir-curso', compact('date', 'instrutor'));
  }

  public function insert(CursoRequest $request)
  {
        // Organização dos POSTS imagens
        $file_01                     = Input::file('file_01');
        $file_02                     = Input::file('file_02');
        $file_03                     = Input::file('file_03');

        // Destino das imagens
        $destinationPath             = 'cursos/';

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
       $curso                           = $request->input('curso');
       $instrutor                       = $request->input('instrutor');
       $carga_h                         = $request->input('carga_h');
       $horario                         = $request->input('horario');
       $cidade                          = $request->input('cidade');
       $local                           = $request->input('local');
       $publico_alvo                    = $request->input('publico_alvo');
       $conteudo_programatico           = $request->input('conteudo_programatico');
       $data                            = $request->input('data');
       $video                           = $request->input('video');


       DB::table('cursos')->insert(
           ['curso' => $curso, 'instrutor' => $instrutor, 'carga_h' => $carga_h, 'horario' => $horario,
            'cidade' => $cidade, 'local' => $local, 'publico_alvo' => $publico_alvo, 'conteudo_programatico' => $conteudo_programatico,
            'data' => $data, 'video' => $video, 'horario' => $horario,

            'file_01' => $fileName_01, 'file_02' => $fileName_02, 'file_03' => $fileName_03
            ]
       );
       // Post Message
       $request->session()->flash('message', 'Curso Cadastrado com Sucesso');
       return Redirect::to('page-listar-curso');
   }

   public function listarCurso()
   {
       $date = date('Y');
       $curso = \SescoopRO\Curso::All();
       return view('pages-panel.page-listar-curso', compact('curso', 'date'));
   }
   public function edit($id)
   {
       $date = date('Y');
       $curso = \SescoopRO\Curso::find($id);
       return view('pages-panel.curso-details', compact('curso', 'date'));
   }

   public function update($id, CursoRequest $request)
   {
       // Organização dos POSTS imagens
       $file_01                     = Input::file('file_01');
       $file_02                     = Input::file('file_02');
       $file_03                     = Input::file('file_03');

       // Destino das imagens
       $destinationPath             = 'cursos/';

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
      $curso                           = $request->input('curso');
      $instrutor                       = $request->input('instrutor');
      $carga_h                         = $request->input('carga_h');
      $horario                         = $request->input('horario');
      $cidade                          = $request->input('cidade');
      $local                           = $request->input('local');
      $publico_alvo                    = $request->input('publico_alvo');
      $conteudo_programatico           = $request->input('conteudo_programatico');
      $data                            = $request->input('data');
      $video                           = $request->input('video');

      // Apagando arquivos existente
      $file_01                = DB::table('cursos')->where('id',$id)->value('file_01');
      $file_02                = DB::table('cursos')->where('id',$id)->value('file_02');
      $file_03                = DB::table('cursos')->where('id',$id)->value('file_03');

      // Deletando arquivos existentes na pasta
      File::delete('cursos/'.$file_01);
      File::delete('cursos/'.$file_02);
      File::delete('cursos/'.$file_03);

      DB::table('cursos')
           ->where('id',$id)
           ->update(
               ['curso' => $curso, 'instrutor' => $instrutor, 'carga_h' => $carga_h, 'horario' => $horario,
                'cidade' => $cidade, 'local' => $local, 'publico_alvo' => $publico_alvo, 'conteudo_programatico' => $conteudo_programatico,
                'data' => $data, 'video' => $video, 'horario' => $horario,

                'file_01' => $fileName_01, 'file_02' => $fileName_02, 'file_03' => $fileName_03
                ]
           );
      // Post Message
      $request->session()->flash('message', 'Curso Atualizado com Sucesso');
      return Redirect::to('page-listar-curso');

   }

   public function destroy($id, Request $request)
   {
       // Apagando arquivos existente
       $file_01                = DB::table('cursos')->where('id',$id)->value('file_01');
       $file_02                = DB::table('cursos')->where('id',$id)->value('file_02');
       $file_03                = DB::table('cursos')->where('id',$id)->value('file_03');

       // Deletando arquivos existentes na pasta
       File::delete('cursos/'.$file_01);
       File::delete('cursos/'.$file_02);
       File::delete('cursos/'.$file_03);

       \SescoopRO\Curso::destroy($id);
       $request->session()->flash('message', 'Curso excluído com sucesso!');
       return Redirect::to('page-listar-curso');
   }


}
