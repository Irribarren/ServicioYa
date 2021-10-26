<?php

namespace App\Http\Controllers;

use App\Models\DetalleServicio;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class DetalleServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalle = new Detalle();
        $detalles = $detalle::get();
        return view('detalle.mostrar')
            ->with('detalles', $detalle)
            ->with('titulo', 'MOSTRAR DETALLES DEL SERVICIO');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detalle.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     $request->validate([
        "ubicacion" => "required | alpha | max:20",
        "descripcion" => "required | alpha | max:50",
        "fecha_entrega" => "required | alpha | max:20",
        "precio" => "required | alpha | max:6",
        "foto_servicio" => "required | alpha | max:6"
    ]);


        $detalleServicio = new Detalle();
        $detalleServicio->ubicacion = $request->ubicacion;
        $detalleServicio->descripcion = $request->descripcion;
        $detalleServicio->fecha_entrega = $request->fecha_entrega;
        $detalleServicio->precio = $request->precio;
        $detalleServicio->foto_servicio = $request->foto_servicio;
        $detalleServicio-> save();
        return redirect(Route("detalle.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetalleServicio  $detalleServicio
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetalleServicio  $detalleServicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resultado = detalle::find($id);
        return view('detalle.editar', ["detalle"=>$resultado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetalleServicio  $detalleServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detalleServicio = Detalle::find($id);
        $detalleServicio->ubicacion = $request->ubicacion;
        $detalleServicio->descripcion = $request->descripcion;
        $detalleServicio->fecha_entrega= $request->fecha_entrega;
        $detalleServicio->precio = $request->precio;
        $detalleServicio->foto_servicio = $request->foto_servicio;
        $detalleServicio-> save();
        return redirect(Route("detalle.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetalleServicio  $detalleServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deta = DetalleServicio::find($id);
        $deta->delete();
        return redirect(Route("estudiante.index"));
    }
}
