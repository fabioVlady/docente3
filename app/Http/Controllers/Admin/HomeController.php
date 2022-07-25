<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Curso_extra;
use App\Models\Curso_Idioma;
use App\Models\Docente;
use App\Models\Experiencia;
use App\Models\Formacion;
use App\Models\Libro;
use App\Models\Persona;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;

class HomeController extends Controller
{
    public function index(){
        $user = User::where('id',auth()->user()->id)->first();
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        // return $user;
        $extensions = [
            'CH'=>'CH',
            'LP'=>'LP',
            'CB'=>'CB',
            'OR'=>'OR',
            'PT'=>'PT',
            'TJ'=>'TJ',
            'SC'=>'SC',
            'BE'=>'BE',
            'PD'=>'PD',
        ];
        $sexos = [
            'Masculino' => 'Masculino',
            'Femenino' => 'Femenino',
        ];
        return view('admin.index',compact('user','persona','extensions','sexos'));
    }
    public function pdf(){
        $user = User::where('id',auth()->user()->id)->first();
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        $docente = Docente::where('persona_id', $persona->id)->first();
        // $materias = DB::select('select * from materias 
        // where id in (select materia_id from docente_materia where docente_id ='.$docente->id.' )');
        $materias = $docente->materias;
        $experiencias = Experiencia::where('persona_id', $persona->id)->get();
        $curso_extras = Curso_extra::where('persona_id', $persona->id)->get();
        $curso_idiomas = Curso_Idioma::where('persona_id', $persona->id)->get();
        $formacions = Formacion::where('persona_id', $persona->id)->get();
        $libros = Libro::where('persona_id', $persona->id)->get();

        // dd($materias);
        // return $user;
        $extensions = [
            'CH'=>'CH',
            'LP'=>'LP',
            'CB'=>'CB',
            'OR'=>'OR',
            'PT'=>'PT',
            'TJ'=>'TJ',
            'SC'=>'SC',
            'BE'=>'BE',
            'PD'=>'PD',
        ];
        $sexos = [
            'Masculino' => 'Masculino',
            'Femenino' => 'Femenino',
        ];
        // $pdf = FacadePdf::loadView('admin.pdf',['user'=>$user,'persona'=>$persona,'extensions'=>$extensions,'sexos'=>$sexos,'materias'=>$materias]);
        $pdf = FacadePdf::loadView('admin.pdf',compact('user','extensions','persona','sexos','materias','experiencias','curso_extras','curso_idiomas','formacions','libros'));
        // $dompdf->setPaper('letter');
        // $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        // return view('admin.pdf',compact('user','persona','extensions','sexos'));
    }
    public function update(Request $request, Persona $persona)
    {   
        // return $request->file('file');
        // return Storage::put('persona-fotos', $request->file('file'));
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        // return $request->get('perfil');
        if($request->file('file')){
            $url = Storage::put('persona-fotos', $request->file('file'));
            if ($persona->url) {
                Storage::delete($persona->url);
            }
            $persona->update([
                'url' => $url
            ]);
        }
        $persona->update($request->all());
        $user = User::where('id',auth()->user()->id)->first();
        return redirect()->route('admin.home',compact('user','persona'))->with('info', 'Datos Actualizados Satisfactoriamente');

        // $request->validate([
        //     'email' => 'email|required|unique:users',
        //     'nombres' => 'required',
        //     'paterno' => 'required',
        //     'materno' => 'required',
        //     'ci' => 'required|unique:personas',
        //     'extension' => 'required',
        //     'sexo' => 'required',
        //     'fecnac' => 'required',
        // ]);
        // $user = User::create([
        //     'name' => $request->get('nombres') . ' ' . $request->get('paterno') . ' ' . $request->get('materno'),
        //     'email' => $request->get('email'),
        //     'password' => bcrypt($request->get('ci')),
        // ]);
        // $persona = Persona::create([
        //     'nombres' => $request->get('nombres'),
        //     'paterno' => $request->get('paterno'),
        //     'materno' => $request->get('materno'),
        //     'ci' => $request->get('ci'),
        //     'extension' => $request->get('extension'),
        //     'sexo' => $request->get('sexo'),
        //     'fecnac' => $request->get('fecnac'),
        //     'user_id' => $user->id,

        // ]);
        
        // return redirect()->route('admin.personas.edit', compact('persona'))->with('info','La persona se creo con exito');
    }
}
