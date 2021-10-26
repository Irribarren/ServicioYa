<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicio = new Servicio();
        $servicios = $servicio::get();
        return view('servicio.mostrar')
            ->with('servicios', $servicios)
            ->with('titulo', 'MOSTRAR SERVICIO');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('servicio.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required | alpha | unique:estudiantes,nombres",
            "apellido" => "required | alpha | max:6"
        ]);

        $servicio = new Servicio();
        $servicio->nombre = $request->nombre;
        $servicio->tipo_servicio = $request->tipo_servicio;
        $servicio-> save();
        return redirect(Route("servicio.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resultado = servicio::find($id);
        return view('servicio.editar', ["servicio"=>$resultado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servicio = Servicio::find($id);
        $servicio->nombre = $request->nombre;
        $servicio->tipo_servicio = $request->tipo_servicio;
        $servicio-> save();
        return redirect(Route("servicio.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicio  $servicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serv = Servicio::find($id);
        $serv->delete();
        return redirect(Route("servicio.index"));
    }
}
