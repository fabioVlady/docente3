<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso_extra;
use App\Models\Persona;
use Illuminate\Http\Request;

class Curso_extraController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.curso_extras.index')->only('index');
        $this->middleware('can:admin.curso_extras.create')->only('create','store');
        $this->middleware('can:admin.curso_extras.edit')->only('edit','update');
        $this->middleware('can:admin.curso_extras.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $personas = Persona::where('user_id',auth()->user()->id)->first();
        $curso_extras = Curso_extra::where('persona_id',$personas->id)->paginate();
        
        return view('admin.curso_extras.index',compact('curso_extras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.curso_extras.create');
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
            'nombre_curso' => 'required',
            'institucion' => 'required',
            'horas' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        $persona = Persona::where('user_id',auth()->user()->id)->first();
        $curso_extra = Curso_extra::create([
            'nombre_curso' => $request->nombre_curso,
            'institucion' => $request->institucion,
            'horas' => $request->horas,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'persona_id' => $persona->id
        ]);

        return redirect()->route('admin.curso_extras.edit', compact('curso_extra'))->with('info','El curso se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso_extra  $curso_extra
     * @return \Illuminate\Http\Response
     */
    public function show(Curso_extra $curso_extra)
    {
        return view('admin.curso_extras.show',compact('curso_extra'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso_extra  $curso_extra
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso_extra $curso_extra)
    {
        return view('admin.curso_extras.edit',compact('curso_extra'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso_extra  $curso_extra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso_extra $curso_extra)
    {
        $request->validate([
            'nombre_curso' => 'required',
            'institucion' => 'required',
            'horas' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $curso_extra->update($request->all());
        // return $curso_idioma;
        return redirect()->route('admin.curso_extras.edit',$curso_extra)->with('info','El curso se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso_extra  $curso_extra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso_extra $curso_extra)
    {
        $curso_extra->delete();

        return redirect()->route('admin.curso_extras.index')->with('info','El curso se elimino con exito');
    }
}
