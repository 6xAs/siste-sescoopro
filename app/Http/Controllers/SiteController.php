<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\UploadedFile;
use App\Transparency;
use DB;
use File;
use Illuminate\Database\Eloquent\Model;
use validador;
use Session;
use Redirect;

class SiteController extends Controller
{
    public function findTransparency(Request $request)
    {

         $date = date('Y');
         $docMain                      = $request->input('docMain');
         $subDoc                       = $request->input('subDoc');
         $ano                          = $request->input('ano');

         $transparency         = DB::table('transparencies')

            ->where('docMain', $request->input('docMain'))
            ->where('subDoc', $request->input('subDoc'))
            ->where('ano', $request->input('ano'))
            ->get();


         return view('pages-site.find-transparency', compact('transparency', 'date'));

    }

    public function findLicitacao(Request $request)
    {

         $date = date('Y');
         $modalidade        = $request->input('modalidade');
         $ano               = $request->input('ano');
         $status            = $request->input('status');

         $licitacao         = DB::table('licitacoes')

            ->where('modalidade', $request->input('modalidade'))
            ->where('ano', $request->input('ano'))
            ->where('status', $request->input('status'))
            ->get();


         return view('pages-site.find-licitacoes', compact('licitacao', 'date'));

    }
}
