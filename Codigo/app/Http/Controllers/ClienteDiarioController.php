<?php

namespace App\Http\Controllers;

use App\ClienteDiario;
use Illuminate\Http\Request;

class ClienteDiarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diarios = ClienteDiario::all();
        //$diarios = DB::select('select * from cliente_diario');
        return view('dashboard.diario.list', compact('diarios', $diarios));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.diario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClienteDiario  $clienteDiario
     * @return \Illuminate\Http\Response
     */
    public function show(ClienteDiario $clienteDiario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClienteDiario  $clienteDiario
     * @return \Illuminate\Http\Response
     */
    public function edit(ClienteDiario $clienteDiario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClienteDiario  $clienteDiario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClienteDiario $clienteDiario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClienteDiario  $clienteDiario
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClienteDiario $clienteDiario)
    {
        //
    }
}
