<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\Facultad;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.materias.index')->only('index');
        $this->middleware('can:admin.materias.create')->only('create','store');
        $this->middleware('can:admin.materias.edit')->only('edit','update');
        $this->middleware('can:admin.materias.destroy')->only('destroy');
    }
    public function index()
    {
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
    }
    
    public function create()
    {
        $facultads = Facultad::pluck('nombre_facultad','id');
        $carreras = Carrera::pluck('nombre_carrera','id');        
        return view('admin.materias.create',compact('facultads','carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'carrera_id' => 'required',
            'nombre_materia' => 'required',
            'sigla' => 'required',
            'descripcion' => 'required',
        ]);
        $materia = Materia::create([
            'nombre_materia' => $request->nombre_materia,
            'sigla' => $request->sigla,
            'descripcion' => $request->descripcion,
            'carrera_id' => $request->carrera_id,
        ]);
        return redirect()->route('admin.materias.edit', compact('materia'))->with('info','La materia se creo con exito');
    }
    
    public function show(Materia $materia)
    {
        //
    }

    public function edit(Materia $materia)
    {
        $carreras = Carrera::pluck('nombre_carrera','id');
        return view('admin.materias.edit', compact('materia','carreras'));
    }

    public function update(Request $request, Materia $materia)
    {   
        $request->validate([
            'carrera_id' => 'required',
            'nombre_materia' => 'required',
            'sigla' => 'required',
            'descripcion' => 'required',
        ]);
        $materia->update($request->all());
        return redirect()->route('admin.materias.edit', $materia)->with('info','La materia se actualizo con exito');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('admin.materias.index')->with('info','La materia se elimino con exito');
    }
}
