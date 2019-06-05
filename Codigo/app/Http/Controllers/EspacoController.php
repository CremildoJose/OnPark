<?php

namespace App\Http\Controllers;

use App\Espaco;
use App\Viatura;
use Illuminate\Http\Request;

class EspacoController extends Controller
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
    public function index()
    {   

        $espacos = Espaco::paginate(3);
        return view('dashboard.espaco.list', compact('espacos', $espacos));
    }
    
    public function create()
    {
        return view('dashboard.espaco.create');
    }

    public function store(Request $request)
    {
        $espaco = Espaco::create([
            'atribuicao' => $request->atribuicao,
            'estado' => $request->estado,
            'iddiario' => $request->iddiario,
            'iddmensal' => $request->iddmensal,
        ]);
        return redirect('/espaco/'.$espaco->id);
    }

    public function edit(Espaco $espaco)
    {
        return view('dashboard.espaco.edit',compact('espaco',$espaco));
    }

}
