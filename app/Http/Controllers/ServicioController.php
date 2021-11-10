<?php

namespace App\Http\Controllers;

use App\Models\servicio;
use Illuminate\Http\Request;
use App\Models\todo;

class servicioController extends Controller
{
    const PAGINACION = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscarpor = $request->get('buscarpor');
      $servicio =  servicio::paginate(5);
      $servicio=servicio::where('nombre', 'like', '%'.$buscarpor.'%')->paginate($this::PAGINACION);
      return view('servicio.index', compact('servicio','buscarpor'));
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
            'nombre' => 'required',
            'Ubicacion' => 'required',
            'Descripcion' => 'required',
            'categoria' => 'required',
            'precio' => 'required',


            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024'
        ]);

        $servicio = $request->all();

        if($imagen = $request->file('imagen')) {
            $rutaGuardarImg = 'imagen/';
            $imagenServicio = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenServicio);
            $servicio['imagen'] = "$imagenServicio";
        }

        servicio::create($servicio);
        return redirect()->route('servicio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $servicio = servicio::find($id);
        $servicio->nombre = $request->nombre;
        $servicio->nombre = $request->Ubicacion;
        $servicio->nombre = $request->Descripcion;
        $servicio->nombre = $request->categoria;
        $servicio->nombre = $request->precio;
        $prod = $request->all();

        if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'imagen/';
            $imagenServicio = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenServicio);
            $prod['imagen'] = "$imagenServicio";
        }else{
            unset($prod['imagen']);
        }
        $servicio->update($prod);
        return redirect()->route('servicio.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('servicio.index');
    }
}
