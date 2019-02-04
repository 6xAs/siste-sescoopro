<?php

namespace SescoopRO\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
        $dateDay = date("d/m/y");
        return view('pages-panel.home-panel', compact('date', 'dateDay'));
    }
}
