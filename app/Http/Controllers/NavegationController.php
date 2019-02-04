<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;

class NavegationController extends Controller
{
    //
    public function pagInserirBanner
    {
        $date = date('Y');
        return view('pages-panel.page-inserir-banner', compact('date'));
    }
    public function pagInserirBanner
    {
        $date = date('Y');
        return view('pages-panel.page-inserir-banner', compact('date'));
    }
}
