<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso_Idioma;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;

class Curso_IdiomaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.curso_idiomas.index')->only('index');
        $this->middleware('can:admin.curso_idiomas.create')->only('create','store');
        $this->middleware('can:admin.curso_idiomas.edit')->only('edit','update');
        $this->middleware('can:admin.curso_idiomas.destroy')->only('destroy');
    }
    public function index()
    {
        $personas = Persona::where('user_id',auth()->user()->id)->first();
        // $personas = DB::table('personas')->where('user_id', auth()->user()->id)->first();
        $curso_idiomas = Curso_Idioma::where('persona_id',$personas->id)->paginate();
        // return $curso_idiomas;
        // $curso_idiomas = DB::table('curso__idiomas')->where('persona_id',$personas->id)->paginate();
     
        // $personas = Persona::find(1);
        // dd(auth()->user()->id);
        // echo($personas);
        return view('admin.curso_idiomas.index', compact('curso_idiomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $nivel = [
            1 => 'Malo',
            2 => 'Regular',
            3 => 'Bueno',
            4 => 'Muy Bueno',
            5 => 'Excelente',
        ];
        return view('admin.curso_idiomas.create',compact('nivel'));
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
            'idioma' => 'required',
            'lectura' => 'required',
            'escritura' => 'required',
            'comprension' => 'required',
            'conversacion' => 'required',
            'nombre_instituto' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);
        $personas = Persona::where('user_id',auth()->user()->id)->first();
         
        $curso_idioma = Curso_Idioma::create([
            'idioma' => $request->idioma,
            'lectura' => $request->lectura,
            'escritura' => $request->escritura,
            'comprension' => $request->comprension,
            'conversacion' => $request->conversacion,
            'nombre_instituto' => $request->nombre_instituto,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_fin' => $request->fecha_fin,
            'persona_id' => $personas->id
        ]);

        return redirect()->route('admin.curso_idiomas.edit', compact('curso_idioma'))->with('info','El curso se creo con exito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso_Idioma  $curso_Idioma
     * @return \Illuminate\Http\Response
     */
    public function show(Curso_Idioma $curso_Idioma)
    {
        return view('admin.curso_idiomas.show', compact('curso_Idioma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso_Idioma  $curso_Idioma
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso_Idioma $curso_idioma)
    {
        $nivel = [
            1 => 'Malo',
            2 => 'Regular',
            3 => 'Bueno',
            4 => 'Muy Bueno',
            5 => 'Excelente',
        ];
        
        // return $curso_idioma;
        return view('admin.curso_idiomas.edit', compact('curso_idioma','nivel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso_Idioma  $curso_Idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso_Idioma $curso_idioma)
    {
        $request->validate([
            'idioma' => 'required',
            'lectura' => 'required',
            'escritura' => 'required',
            'comprension' => 'required',
            'conversacion' => 'required',
            'nombre_instituto' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]);

        $curso_idioma->update($request->all());
        // return $curso_idioma;
        return redirect()->route('admin.curso_idiomas.edit',$curso_idioma)->with('info','El curso se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso_Idioma  $curso_Idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso_Idioma $curso_idioma)
    {
        $curso_idioma->delete();

        return redirect()->route('admin.curso_idiomas.index')->with('info','El curso se elimino con exito');
    }
}
