<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MensalController extends Controller
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
     * Show the application Cliente Diario .
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('dashboard.mensal.list');
    }
    
    public function create()
    {
        return view('dashboard.mensal.create');
    }
}
