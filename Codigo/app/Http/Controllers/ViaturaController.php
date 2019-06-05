<?php

namespace App\Http\Controllers;

use App\Viatura;
use Illuminate\Http\Request;

class ViaturaController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.viatura.create');
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
     * @param  \App\Viatura  $viatura
     * @return \Illuminate\Http\Response
     */
    public function show(Viatura $viatura)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Viatura  $viatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Viatura $viatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Viatura  $viatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viatura $viatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Viatura  $viatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viatura $viatura)
    {
        //
    }
}
