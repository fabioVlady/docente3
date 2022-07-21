<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use App\Models\Persona;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.docentes.index')->only('index');
        $this->middleware('can:admin.docentes.create')->only('create','store');
        $this->middleware('can:admin.docentes.edit')->only('edit','update');
        $this->middleware('can:admin.docentes.destroy')->only('destroy');
    }
    public function index()
    {
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        // $docentes = Docente::where('persona_id', $persona->id)->paginate();
        $docentes = Docente::all();
        return view('admin.docentes.index', compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::pluck('ci','id');
        return view('admin.docentes.create',compact('personas'));
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
            'item' => 'required',
            'grado' => 'required',
            'tipo' => 'required',
            'persona_id'=> 'required|unique:docentes',
        ]);
        // $persona = Persona::where('user_id', auth()->user()->id)->first();
        // $docente = Docente::create([
        //     'item' => $request->item,
        //     'grado' => $request->grado,
        //     'tipo' => $request->tipo,
        //     'persona_id' => $persona->id,
        // ]);
        $docente = Docente::create($request->all());
        // return $request;
        return redirect()->route('admin.docentes.edit', compact('docente'))->with('info','El docente se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        return view('admin.docentes.show', compact('docente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
        $personas = Persona::pluck('ci','id');

        return view('admin.docentes.edit', compact('docente', 'personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        $request->validate([
            'item' => 'required',
            'grado' => 'required',
            'tipo' => 'required',
            "persona_id'=> 'required|unique:docentes,persona_id,$docente->id",
        ]);

        $docente->update($request->all());
        return redirect()->route('admin.docentes.edit', $docente)->with('info','El docente se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect()->route('admin.docentes.index')->with('info','El docente se elimino con exito');
    }
}
