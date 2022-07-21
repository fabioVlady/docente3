<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Libro;
use App\Models\Persona;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::where('user_id',auth()->user()->id)->first();
        $libros = Libro::where('persona_id',$personas->id)->paginate();
        return view('admin.libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $year = date("Y");
        return view('admin.libros.create',compact('year'));
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
            'titulo' => 'required',
            'editorial' => 'required',
            'gestion_publicacion' => 'required',
            'fecha_publicacion' => 'required',
            'edicion' => 'required',

        ]);
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        $libro = Libro::create([
            'titulo' => $request->titulo,
            'editorial' => $request->editorial,
            'gestion_publicacion' => $request->gestion_publicacion,
            'fecha_publicacion' => $request->fecha_publicacion,
            'edicion' => $request->edicion,
            'persona_id' => $persona->id,
        ]);
        // return $formacion;
        return redirect()->route('admin.libros.edit', compact('libro'))->with('info','La publicacion del Libro se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)
    {
        $year = date("Y");
        return view('admin.libros.edit', compact('libro','year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial' => 'required',
            'gestion_publicacion' => 'required',
            'fecha_publicacion' => 'required',
            'edicion' => 'required',
        ]);

        $libro->update($request->all());
        return redirect()->route('admin.libros.edit', $libro)->with('info','La publicacion se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro)
    {
        //
    }
}
