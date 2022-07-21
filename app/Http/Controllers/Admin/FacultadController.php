<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.facultads.index')->only('index');
        $this->middleware('can:admin.facultads.create')->only('create','store');
        $this->middleware('can:admin.facultads.edit')->only('edit','update');
        $this->middleware('can:admin.facultads.destroy')->only('destroy');
    }
    public function index()
    {
        $facultads = Facultad::all();
        return view('admin.facultads.index', compact('facultads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facultads.create');
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
            'nombre_facultad' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
        ]);
        $facultad = Facultad::create([
            'nombre_facultad' => $request->nombre_facultad,
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
        ]);
        return redirect()->route('admin.facultads.edit', compact('facultad'))->with('info','La Facultad se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function show(Facultad $facultad)
    {
        return view('admin.facultads.show', compact('facultad'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function edit(Facultad $facultad)
    {
        return view('admin.facultads.edit', compact('facultad'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facultad $facultad)
    {
        $request->validate([
            'nombre_facultad' => 'required',
            'descripcion' => 'required',
            'ubicacion' => 'required',
        ]);

        $facultad->update($request->all());
        return redirect()->route('admin.facultads.edit', $facultad)->with('info','La Facultad se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facultad  $facultad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facultad $facultad)
    {
        $facultad->delete();
        return redirect()->route('admin.facultads.index')->with('info','La Facultad se elimino con exito');
    }
}
