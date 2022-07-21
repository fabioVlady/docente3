<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\Facultad;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.carreras.index')->only('index');
        $this->middleware('can:admin.carreras.create')->only('create','store');
        $this->middleware('can:admin.carreras.edit')->only('edit','update');
        $this->middleware('can:admin.carreras.destroy')->only('destroy');

    }

    public function index()
    {
        $carreras = Carrera::all();
        return view('admin.carreras.index', compact('carreras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facultads = Facultad::pluck('nombre_facultad','id');
        return view('admin.carreras.create',compact('facultads'));
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
            'nombre_carrera' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'facultad_id' => 'required'
        ]);
        $carrera = Carrera::create([
            'nombre_carrera' => $request->nombre_carrera,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'facultad_id' => $request->facultad_id
        ]);
        return redirect()->route('admin.carreras.edit', compact('carrera'))->with('info','La carrera se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        return view('admin.carreras.show', compact('carrera'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {   
        $facultads = Facultad::pluck('nombre_facultad','id');
        return view('admin.carreras.edit', compact('carrera','facultads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'nombre_carrera' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'facultad_id' => 'required'
        ]);

        $carrera->update($request->all());
        return redirect()->route('admin.carreras.edit', $carrera)->with('info','La carrera se actualizo con exito');
    }

    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route('admin.carreras.index')->with('info','La carrera se elimino con exito');
    }
}
