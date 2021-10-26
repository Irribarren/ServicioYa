<?php

namespace App\Http\Controllers;

use App\Models\Comprador;
use Illuminate\Http\Request;

class CompradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comprador = new Comprador();
        $compradores = $comprador::get();
        return view('comprador.mostrar')
            ->with('compradores', $compradores)
            ->with('titulo', 'MOSTRAR AL COMPRADOR');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Comprador  $comprador
     * @return \Illuminate\Http\Response
     */
    public function show(Comprador $comprador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comprador  $comprador
     * @return \Illuminate\Http\Response
     */
    public function edit(Comprador $comprador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comprador  $comprador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comprador $comprador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comprador  $comprador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comprador $comprador)
    {
        //
    }
}
