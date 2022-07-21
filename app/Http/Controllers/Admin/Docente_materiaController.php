<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\Docente;
use App\Models\Docente_materia;
use App\Models\Facultad;
use App\Models\Materia;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Docente_materiaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.docente_materia.index')->only('index');
        $this->middleware('can:admin.docente_materia.create')->only('create','store');
        $this->middleware('can:admin.docente_materia.edit')->only('edit','update');
        $this->middleware('can:admin.docente_materia.destroy')->only('destroy');
    }
    public $var = false;
    public $var_car = null;
    public $var_fac = null;
    public function index()
    {   
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        // $docente = $persona->docente()->get();
        $docente = Docente::where('persona_id',$persona->id)->first();
        // return $docente;
        // return $docente->materias()->get();
        // $docente_materias = $docente->materias()->get();
        // $docente_materias = Docente_materia::all();
        $docente_materias = Docente_materia::where('docente_id', $docente->id)->latest('id')->get();
        // return $docente_materias;
        // docente_id
        // return $docente_materias;
        return view('admin.docente_materia.index', compact('docente_materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $var=false;
        $facultads = Facultad::pluck('nombre_facultad','id');
        // $facultads = Facultad::all();
        $dias = ['lunes','martes','miercoles','jueves','viernes','sabado'];
        return view('admin.docente_materia.create', compact('facultads','var','dias'));
        // $personas = Persona::pluck('ci','id');
        // return view('admin.docentes.create',compact('personas'));
    }

    public function data(Request $request){
        if($request->has('facultad_id')){
            $parent_id = $request->get('facultad_id');
            $data = Carrera::where('facultad_id', $parent_id)->get();
            return ['success'=>true, 'data'=>$data];
        }
    }
    public function carrera($id)
    {
        $cities = DB::table("carreras")
                    ->where("facultad_id",$id)
                    ->pluck('nombre_carrera','id');
        return json_encode($cities);
    }
    public function materia($id)
    {
        $cities = DB::table("materias")
                    ->where("carrera_id",$id)
                    ->pluck('nombre_materia','id');
        return json_encode($cities);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'materia_id' => 'required',
            'facultad_id' => 'required',
            'carrera_id' => 'required',
            'periodo' => 'required',
            'inicio' => 'required',
            'fin'=> 'required',
            'dia1'=> 'required',
            'hora_dia1'=> 'required',
            'dia2'=> 'required',
            'hora_dia2'=> 'required',
            'primer_parcial'=> 'required',
            'segundo_parcial'=> 'required',
            'examen_final'=> 'required',
        ]);
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        $docente = Docente::where('persona_id',$persona->id)->first();

        $docente_materium = Docente_materia::create([
            'materia_id' => $request->materia_id,
            'docente_id' => $docente->id,
            'periodo' => $request->periodo,
            'inicio' => $request->inicio,
            'fin'=> $request->fin,
            'dia1'=> $request->dia1,
            'hora_dia1'=> $request->hora_dia1,
            'dia2'=> $request->dia2,
            'hora_dia2'=> $request->hora_dia2,
            'primer_parcial'=> $request->primer_parcial,
            'segundo_parcial'=> $request->segundo_parcial,
            'examen_final'=> $request->examen_final,
        ]);
        return redirect()->route('admin.docente_materia.edit', compact('docente_materium'))->with('info','La Materia Dictada se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Docente_materia  $docente_materia
     * @return \Illuminate\Http\Response
     */
    public function show(Docente_materia $docente_materium)
    {
        return view('admin.docentes.show', compact('docente'));
        return view('admin.docente_materia.show', compact('docente_materium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Docente_materia  $docente_materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente_materia $docente_materium)
    {
        // $personas = Persona::pluck('ci','id');
        // return $docente_materium;
        $var=true;
        
        $carreras = Carrera::pluck('nombre_carrera','id');
        $materias = Materia::pluck('nombre_materia','id');
        $facultads = Facultad::pluck('nombre_facultad','id');

        $materia = Materia::where('id', $docente_materium->materia_id )->first();
        $carrera = Carrera::where('id', $materia->carrera_id)->first();

        $var_car = $carrera->id;
        $var_fac = $carrera->facultad_id;

        // return $var_car;
        // return  compact('carrera','materia','docente_materium', 'facultads');
        return view('admin.docente_materia.edit', compact('var','var_car','var_fac','materias','carreras','docente_materium', 'facultads'));
        // return view('admin.docente_materia.edit', compact('docente_materia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Docente_materia  $docente_materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente_materia $docente_materium)
    {
        // return compact('request','docente_materium');
        
        $request->validate([
            
        ]);
        $docente_materium->update($request->all());
        // return $request;
        // $docente->update($request->all());
        return redirect()->route('admin.docente_materia.edit', $docente_materium)->with('info','La Materia Dictada se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Docente_materia  $docente_materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente_materia $docente_materium)
    {   
        $docente_materium->delete();
        return redirect()->route('admin.docente_materia.index')->with('info','La Materia Dictada se elimino con exito');
    }
}
