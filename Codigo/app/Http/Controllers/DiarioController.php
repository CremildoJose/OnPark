<?php

namespace App\Http\Controllers;

use App\ClienteDiario;
use Illuminate\Http\Request;

class DiarioController extends Controller
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
        
        return view('dashboard.diario.list');
    }
    
    public function create()
    {
        return view('dashboard.diario.create');
    }
}
