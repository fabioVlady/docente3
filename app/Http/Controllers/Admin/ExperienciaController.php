<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experiencia;
use App\Models\Persona;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.experiencias.index')->only('index');
        $this->middleware('can:admin.experiencias.create')->only('create','store');
        $this->middleware('can:admin.experiencias.edit')->only('edit','update');
        $this->middleware('can:admin.experiencias.destroy')->only('destroy');
    }
    public function index()
    {
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        $experiencias = Experiencia::where('persona_id', $persona->id)->paginate();
        return view('admin.experiencias.index', compact('experiencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experiencias.create');
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
            'nombre_empresa' => 'required',
            'tipo_institucion' => 'required',
            'cargo' => 'required',
            'funciones' => 'required',

            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        $experiencia = Experiencia::create([
            'nombre_empresa' => $request->nombre_empresa,
            'tipo_institucion' => $request->tipo_institucion,
            'cargo' => $request->cargo,
            'funciones' => $request->funciones,

            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'persona_id' => $persona->id,
        ]);
        return redirect()->route('admin.experiencias.edit', compact('experiencia'))->with('info','La Experiencia Laboral se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function show(Experiencia $experiencia)
    {
        return view('admin.experiencias.show', compact('experiencia'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function edit(Experiencia $experiencia)
    {
        return view('admin.experiencias.edit', compact('experiencia'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experiencia $experiencia)
    {
        $request->validate([
            'nombre_empresa' => 'required',
            'tipo_institucion' => 'required',
            'cargo' => 'required',
            'funciones' => 'required',

            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $experiencia->update($request->all());
        return redirect()->route('admin.experiencias.edit', $experiencia)->with('info','La Experiencia se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experiencia  $experiencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experiencia $experiencia)
    {
        $experiencia->delete();
        return redirect()->route('admin.experiencias.index')->with('info','La experiencia se elimino con exito');
    }
}
