<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Formacion;
use App\Models\Persona;

class FormacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.formacions.index')->only('index');
        $this->middleware('can:admin.formacions.create')->only('create','store');
        $this->middleware('can:admin.formacions.edit')->only('edit','update');
        $this->middleware('can:admin.formacions.destroy')->only('destroy');
    }
    public function index()
    {
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        $formacions = Formacion::where('persona_id', $persona->id)->paginate();
        return view('admin.formacions.index', compact('formacions'));
    }

    public function create()
    {
        return view('admin.formacions.create');

    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nivel_estudio' => 'required',
            'institucion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        $formacion = Formacion::create([
            'nivel_estudio' => $request->nivel_estudio,
            'institucion' => $request->institucion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'persona_id' => $persona->id,
        ]);
        // return $formacion;
        return redirect()->route('admin.formacions.edit', compact('formacion'))->with('info','La formacion se creo con exito');
    }

    public function show(Formacion $formacion)
    {
        return view('admin.formacions.show', compact('formacion'));
        
    }

    
    public function edit(Formacion $formacion)
    {   
        return view('admin.formacions.edit', compact('formacion'));

    }

    public function update(Request $request, Formacion $formacion)
    {
        $request->validate([
            'nivel_estudio' => 'required',
            'institucion' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $formacion->update($request->all());
        return redirect()->route('admin.formacions.edit', $formacion)->with('info','La formacion se actualizo con exito');
    }

    
    public function destroy(Formacion $formacion)
    {
        $formacion->delete();
        return redirect()->route('admin.formacions.index')->with('info','La formacion se elimino con exito');
    }
}
