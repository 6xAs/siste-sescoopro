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
       $ano                                = $request->input('ano');
       $number_process                     = $request->input('number_process');
       $modalidade                         = $request->input('modalidade');
       $edital                             = $request->input('edital');
       $tipo_licitacao                     = $request->input('tipo_licitacao');
       $objeto                             = $request->input('objeto');
       $local                              = $request->input('local');
       $status                             = $request->input('status');
       $telefone_fixo                      = $request->input('telefone_fixo');
       $telefone_celular                   = $request->input('telefone_celular');
       $email                              = $request->input('email');
       $hora_abertura                      = $request->input('hora_abertura');
       $data                               = $request->input('data');
       // File_01
       $name_file_01                       = $request->input('name_file_01');
       $data_file_01                       = $request->input('data_file_01');
       $fileName_01                        = $request->input('file_01');
       //
       // File_02
       $name_file_02                       = $request->input('name_file_02');
       $data_file_02                       = $request->input('data_file_02');
       $fileName_02                        = $request->input('file_02');
       //
       // File_03
       $name_file_03                       = $request->input('name_file_03');
       $data_file_03                       = $request->input('data_file_03');
       $fileName_03                        = $request->input('file_03');
       //
       // File_04
       $name_file_04                       = $request->input('name_file_04');
       $data_file_04                       = $request->input('data_file_04');
       $fileName_04                        = $request->input('file_04');
       //
       // File_05
       $name_file_05                       = $request->input('name_file_05');
       $data_file_05                       = $request->input('data_file_05');
       $fileName_05                        = $request->input('file_05');
       //
       // File_06
       $name_file_06                       = $request->input('name_file_06');
       $data_file_06                       = $request->input('data_file_06');
       $fileName_06                        = $request->input('file_06');
       //
       // File_07
       $name_file_07                       = $request->input('name_file_07');
       $data_file_07                       = $request->input('data_file_07');
       $fileName_07                        = $request->input('file_07');
       //
       // File_08
       $name_file_08                       = $request->input('name_file_08');
       $data_file_08                       = $request->input('data_file_08');
       $fileName_08                        = $request->input('file_08');
       //
       // File_09
       $name_file_09                       = $request->input('name_file_09');
       $data_file_09                       = $request->input('data_file_09');
       $fileName_09                        = $request->input('file_09');
       //
       // File_010
       $name_file_010                       = $request->input('name_file_010');
       $data_file_010                       = $request->input('data_file_010');
       $fileName_010                        = $request->input('file_010');
       //
       // File_011
       $name_file_011                       = $request->input('name_file_011');
       $data_file_011                       = $request->input('data_file_011');
       $fileName_011                        = $request->input('file_011');
       //
       // File_012
       $name_file_012                       = $request->input('name_file_012');
       $data_file_012                       = $request->input('data_file_012');
       $fileName_012                        = $request->input('file_012');

       // inputs files
       $file_01                = $request->file('file_01');
       $file_02                = $request->file('file_02');
       $file_03                = $request->file('file_03');
       $file_04                = $request->file('file_04');
       $file_05                = $request->file('file_05');
       $file_06                = $request->file('file_06');
       $file_07                = $request->file('file_07');
       $file_08                = $request->file('file_08');
       $file_09                = $request->file('file_09');
       $file_010               = $request->file('file_010');
       $file_011                = $request->file('file_011');
       $file_012                = $request->file('file_012');

       //Destino da pasta
       $destinationPath                   = 'document-licitacao/';

       // File_01
        if ($request->hasFile('file_01')) {

            $fileName_01            = $file_01->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_01')->move($destinationPath, $fileName_01);
        }
        // File_02
        if ($request->hasFile('file_02')) {

            $fileName_02            = $file_02->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_02')->move($destinationPath, $fileName_02);
        }
        // File_03
        if ($request->hasFile('file_03')) {

            $fileName_03            = $file_03->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_03')->move($destinationPath, $fileName_03);
        }
        // File_04
        if ($request->hasFile('file_04')) {

            $fileName_04            = $file_04->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_04')->move($destinationPath, $fileName_04);
        }
        // File_05
        if ($request->hasFile('file_05')) {

            $fileName_05            = $file_05->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_05')->move($destinationPath, $fileName_05);
        }
        // File_06
        if ($request->hasFile('file_06')) {

            $fileName_06            = $file_06->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_06')->move($destinationPath, $fileName_06);
        }
        // File_07
        if ($request->hasFile('file_07')) {

            $fileName_07            = $file_07->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_07')->move($destinationPath, $fileName_07);
        }
        // File_08
        if ($request->hasFile('file_08')) {

            $fileName_08            = $file_08->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_08')->move($destinationPath, $fileName_08);
        }
        // File_09
        if ($request->hasFile('file_09')) {

            $fileName_09            = $file_09->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_09')->move($destinationPath, $fileName_09);
        }
        // File_010
        if ($request->hasFile('file_010')) {

            $fileName_010            = $file_010->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_010')->move($destinationPath, $fileName_010);
        }
        // File_011
        if ($request->hasFile('file_011')) {

            $fileName_011            = $file_011->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_011')->move($destinationPath, $fileName_011);
        }
        // File_012
        if ($request->hasFile('file_012')) {

            $fileName_012            = $file_012->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_012')->move($destinationPath, $fileName_012);
        }


       DB::table('licitacoes')->insert(
           [
            'ano' => $ano,'number_process' => $number_process, 'modalidade' => $modalidade,
            'edital' => $edital, 'tipo_licitacao' => $tipo_licitacao, 'objeto' => $objeto, 'local' => $local,
            'status' => $status,'telefone_fixo' => $telefone_fixo, 'telefone_celular' => $telefone_celular,
            'email' => $email, 'hora_abertura' => $hora_abertura, 'data' => $data,


            'name_file_01' => $name_file_01, 'data_file_01' => $data_file_01, 'file_01' => $fileName_01,
            'name_file_02' => $name_file_02, 'data_file_02' => $data_file_02, 'file_02' => $fileName_02,
            'name_file_03' => $name_file_03, 'data_file_03' => $data_file_03, 'file_03' => $fileName_03,
            'name_file_04' => $name_file_04, 'data_file_04' => $data_file_04, 'file_04' => $fileName_04,
            'name_file_05' => $name_file_05, 'data_file_05' => $data_file_05, 'file_05' => $fileName_05,
            'name_file_06' => $name_file_06, 'data_file_06' => $data_file_06, 'file_06' => $fileName_06,
            'name_file_07' => $name_file_07, 'data_file_07' => $data_file_07, 'file_07' => $fileName_07,
            'name_file_08' => $name_file_08, 'data_file_08' => $data_file_08, 'file_08' => $fileName_08,
            'name_file_09' => $name_file_09, 'data_file_09' => $data_file_09, 'file_09' => $fileName_09,
            'name_file_010' => $name_file_010, 'data_file_010' => $data_file_010, 'file_010' => $fileName_010,
            'name_file_011' => $name_file_011, 'data_file_011' => $data_file_011, 'file_011' => $fileName_011,
            'name_file_012' => $name_file_012, 'data_file_012' => $data_file_012, 'file_012' => $fileName_012


            ]
       );

       $request->session()->flash('message', 'Documento Inserido com Sucesso');
       return Redirect::to('page-listar-licitacao');


    }

    public function listarLicitacao()
    {
        $date = date('Y');
        $licitacao = \SescoopRO\Licitacoes::All();
        return view('pages-panel.page-listar-licitacao', compact('licitacao', 'date'));
    }

    public function show($id)
    {
        $date = date('Y');
        $licitacao = \SescoopRO\Licitacoes::find($id);
        return view('pages-panel.showlicitacao', compact('licitacao', 'date'));

    }

    public function edit($id)
    {
        $date = date('Y');
        $licitacao = \SescoopRO\Licitacoes::find($id);
        return view('pages-panel.licitacaodetails', compact('licitacao', 'date'));
    }

    public function update($id, LicitacaoRequest $request)
    {

        // Apagando arquivos existente

            $fileName_01    = DB::table('licitacoes')->where('id',$id)->value('file_01');
            File::delete('document-licitacao/'.$fileName_01);


            // File_02
            $fileName_02    = DB::table('licitacoes')->where('id',$id)->value('file_02');
            File::delete('document-licitacao/'.$fileName_02);


            // File_03
            $fileName_03    = DB::table('licitacoes')->where('id',$id)->value('file_03');
            File::delete('document-licitacao/'.$fileName_03);


            // File_04
            $fileName_04    = DB::table('licitacoes')->where('id',$id)->value('file_04');
            File::delete('document-licitacao/'.$fileName_04);

            // File_05
            $fileName_05    = DB::table('licitacoes')->where('id',$id)->value('file_05');
            File::delete('document-licitacao/'.$fileName_05);


            // File_06
            $fileName_06    = DB::table('licitacoes')->where('id',$id)->value('file_06');
            File::delete('document-licitacao/'.$fileName_06);


            // File_07
            $fileName_07    = DB::table('licitacoes')->where('id',$id)->value('file_07');
            File::delete('document-licitacao/'.$fileName_07);


            // File_08
            $fileName_08    = DB::table('licitacoes')->where('id',$id)->value('file_08');
            File::delete('document-licitacao/'.$fileName_08);


            // File_09
            $fileName_09    = DB::table('licitacoes')->where('id',$id)->value('file_09');
            File::delete('document-licitacao/'.$fileName_09);



            // File_010
            $fileName_010    = DB::table('licitacoes')->where('id',$id)->value('file_010');
            File::delete('document-licitacao/'.$fileName_010);


            // File_011
            $fileName_011    = DB::table('licitacoes')->where('id',$id)->value('file_011');
            File::delete('document-licitacao/'.$fileName_011);


            // File_012
            $fileName_012    = DB::table('licitacoes')->where('id',$id)->value('file_012');
            File::delete('document-licitacao/'.$fileName_012);


        // Validação dos dados
       $ano                                = $request->input('ano');
       $number_process                     = $request->input('number_process');
       $modalidade                         = $request->input('modalidade');
       $edital                             = $request->input('edital');
       $tipo_licitacao                     = $request->input('tipo_licitacao');
       $objeto                             = $request->input('objeto');
       $local                              = $request->input('local');
       $status                             = $request->input('status');
       $telefone_fixo                      = $request->input('telefone_fixo');
       $telefone_celular                   = $request->input('telefone_celular');
       $email                              = $request->input('email');
       $hora_abertura                      = $request->input('hora_abertura');
       $data                               = $request->input('data');
       // File_01
       $name_file_01                       = $request->input('name_file_01');
       $data_file_01                       = $request->input('data_file_01');
       $fileName_01                        = $request->input('file_01');
       //
       // File_02
       $name_file_02                       = $request->input('name_file_02');
       $data_file_02                       = $request->input('data_file_02');
       $fileName_02                        = $request->input('file_02');
       //
       // File_03
       $name_file_03                       = $request->input('name_file_03');
       $data_file_03                       = $request->input('data_file_03');
       $fileName_03                        = $request->input('file_03');
       //
       // File_04
       $name_file_04                       = $request->input('name_file_04');
       $data_file_04                       = $request->input('data_file_04');
       $fileName_04                        = $request->input('file_04');
       //
       // File_05
       $name_file_05                       = $request->input('name_file_05');
       $data_file_05                       = $request->input('data_file_05');
       $fileName_05                        = $request->input('file_05');
       //
       // File_06
       $name_file_06                       = $request->input('name_file_06');
       $data_file_06                       = $request->input('data_file_06');
       $fileName_06                        = $request->input('file_06');
       //
       // File_07
       $name_file_07                       = $request->input('name_file_07');
       $data_file_07                       = $request->input('data_file_07');
       $fileName_07                        = $request->input('file_07');
       //
       // File_08
       $name_file_08                       = $request->input('name_file_08');
       $data_file_08                       = $request->input('data_file_08');
       $fileName_08                        = $request->input('file_08');
       //
       // File_09
       $name_file_09                       = $request->input('name_file_09');
       $data_file_09                       = $request->input('data_file_09');
       $fileName_09                        = $request->input('file_09');
       //
       // File_010
       $name_file_010                       = $request->input('name_file_010');
       $data_file_010                       = $request->input('data_file_010');
       $fileName_010                        = $request->input('file_010');
       //
       // File_011
       $name_file_011                       = $request->input('name_file_011');
       $data_file_011                       = $request->input('data_file_011');
       $fileName_011                        = $request->input('file_011');
       //
       // File_012
       $name_file_012                       = $request->input('name_file_012');
       $data_file_012                       = $request->input('data_file_012');
       $fileName_012                        = $request->input('file_012');

       // inputs files
       $file_01                = $request->file('file_01');
       $file_02                = $request->file('file_02');
       $file_03                = $request->file('file_03');
       $file_04                = $request->file('file_04');
       $file_05                = $request->file('file_05');
       $file_06                = $request->file('file_06');
       $file_07                = $request->file('file_07');
       $file_08                = $request->file('file_08');
       $file_09                = $request->file('file_09');
       $file_010               = $request->file('file_010');
       $file_011                = $request->file('file_011');
       $file_012                = $request->file('file_012');

       //Destino da pasta
       $destinationPath                   = 'document-licitacao/';

       // File_01
        if ($request->hasFile('file_01')) {

            $fileName_01            = $file_01->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_01')->move($destinationPath, $fileName_01);
        }
        // File_02
        if ($request->hasFile('file_02')) {

            $fileName_02            = $file_02->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_02')->move($destinationPath, $fileName_02);
        }
        // File_03
        if ($request->hasFile('file_03')) {

            $fileName_03            = $file_03->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_03')->move($destinationPath, $fileName_03);
        }
        // File_04
        if ($request->hasFile('file_04')) {

            $fileName_04            = $file_04->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_04')->move($destinationPath, $fileName_04);
        }
        // File_05
        if ($request->hasFile('file_05')) {

            $fileName_05            = $file_05->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_05')->move($destinationPath, $fileName_05);
        }
        // File_06
        if ($request->hasFile('file_06')) {

            $fileName_06            = $file_06->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_06')->move($destinationPath, $fileName_06);
        }
        // File_07
        if ($request->hasFile('file_07')) {

            $fileName_07            = $file_07->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_07')->move($destinationPath, $fileName_07);
        }
        // File_08
        if ($request->hasFile('file_08')) {

            $fileName_08            = $file_08->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_08')->move($destinationPath, $fileName_08);
        }
        // File_09
        if ($request->hasFile('file_09')) {

            $fileName_09            = $file_09->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_09')->move($destinationPath, $fileName_09);
        }
        // File_010
        if ($request->hasFile('file_010')) {

            $fileName_010            = $file_010->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_010')->move($destinationPath, $fileName_010);
        }
        // File_011
        if ($request->hasFile('file_011')) {

            $fileName_011            = $file_011->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_011')->move($destinationPath, $fileName_011);
        }
        // File_012
        if ($request->hasFile('file_012')) {

            $fileName_012            = $file_012->getClientOriginalName();
            // Inserindo na pasta
            Input::file('file_012')->move($destinationPath, $fileName_012);
        }



       DB::table('licitacoes')
            ->where('id',$id)
            ->update(

            [
                'ano' => $ano, 'number_process' => $number_process, 'modalidade' => $modalidade,
                'edital' => $edital, 'tipo_licitacao' => $tipo_licitacao, 'objeto' => $objeto, 'local' => $local,
                'status' => $status,'telefone_fixo' => $telefone_fixo, 'telefone_celular' => $telefone_celular,
                'email' => $email, 'hora_abertura' => $hora_abertura, 'data' => $data,

                 'name_file_01' => $name_file_01, 'data_file_01' => $data_file_01, 'file_01' => $fileName_01,
                 'name_file_02' => $name_file_02, 'data_file_02' => $data_file_02, 'file_02' => $fileName_02,
                 'name_file_03' => $name_file_03, 'data_file_03' => $data_file_03, 'file_03' => $fileName_03,
                 'name_file_04' => $name_file_04, 'data_file_04' => $data_file_04, 'file_04' => $fileName_04,
                 'name_file_05' => $name_file_05, 'data_file_05' => $data_file_05, 'file_05' => $fileName_05,
                 'name_file_06' => $name_file_06, 'data_file_06' => $data_file_06, 'file_06' => $fileName_06,
                 'name_file_07' => $name_file_07, 'data_file_07' => $data_file_07, 'file_07' => $fileName_07,
                 'name_file_08' => $name_file_08, 'data_file_08' => $data_file_08, 'file_08' => $fileName_08,
                 'name_file_09' => $name_file_09, 'data_file_09' => $data_file_09, 'file_09' => $fileName_09,
                 'name_file_010' => $name_file_010, 'data_file_010' => $data_file_010, 'file_010' => $fileName_010,
                 'name_file_011' => $name_file_011, 'data_file_011' => $data_file_011, 'file_011' => $fileName_011,
                 'name_file_012' => $name_file_012, 'data_file_012' => $data_file_012, 'file_012' => $fileName_012

            ]
            );

        // Post Message
        $request->session()->flash('message', 'Documento Atualizado com Sucesso');
        return Redirect::to('page-listar-licitacao');
    }

    public function destroy($id, Request $request)
    {

        // File_01
        $fileName_01    = DB::table('licitacoes')->where('id',$id)->value('file_01');
        File::delete('document-licitacao/'.$fileName_01);
        // File_02
        $fileName_02    = DB::table('licitacoes')->where('id',$id)->value('file_02');
        File::delete('document-licitacao/'.$fileName_02);
        // File_03
        $fileName_03    = DB::table('licitacoes')->where('id',$id)->value('file_03');
        File::delete('document-licitacao/'.$fileName_03);
        // File_04
        $fileName_04    = DB::table('licitacoes')->where('id',$id)->value('file_04');
        File::delete('document-licitacao/'.$fileName_04);
        // File_05
        $fileName_05    = DB::table('licitacoes')->where('id',$id)->value('file_05');
        File::delete('document-licitacao/'.$fileName_05);
        // File_06
        $fileName_06    = DB::table('licitacoes')->where('id',$id)->value('file_06');
        File::delete('document-licitacao/'.$fileName_06);
        // File_07
        $fileName_07    = DB::table('licitacoes')->where('id',$id)->value('file_07');
        File::delete('document-licitacao/'.$fileName_07);
        // File_08
        $fileName_08    = DB::table('licitacoes')->where('id',$id)->value('file_08');
        File::delete('document-licitacao/'.$fileName_08);
        // File_09
        $fileName_09    = DB::table('licitacoes')->where('id',$id)->value('file_09');
        File::delete('document-licitacao/'.$fileName_09);
        // File_010
        $fileName_010    = DB::table('licitacoes')->where('id',$id)->value('file_010');
        File::delete('document-licitacao/'.$fileName_010);
        // File_011
        $fileName_011    = DB::table('licitacoes')->where('id',$id)->value('file_011');
        File::delete('document-licitacao/'.$fileName_011);
        // File_012
        $fileName_012    = DB::table('licitacoes')->where('id',$id)->value('file_012');
        File::delete('document-licitacao/'.$fileName_012);



        \SescoopRO\Licitacoes::destroy($id);
        $request->session()->flash('message', 'Documento excluído com sucesso');
        return Redirect::to('page-listar-licitacao');

    }


}
