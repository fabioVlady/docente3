<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminReportesController extends Controller
{
    public function repoDocentes()
    {
        $docentes = DB::select("SELECT d.id,d.item,d.grado,d.tipo,d.persona_id,pe.nombres||' '||pe.paterno||' '||pe.materno as nombre,pe.ci||' '||pe.extension as carnet,pe.sexo FROM docentes d INNER JOIN personas pe ON d.persona_id = pe.id");
        return view('admin.reportes.repoDocentes', compact('docentes'));
    }
    public function repoVerDocente($id){
        // echo $id;
        $datos = DB::select('SELECT materias.nombre_materia, count(*) 
        FROM docente_materia
        INNER JOIN materias ON docente_materia.materia_id = materias.id
        where docente_materia.docente_id ='.$id.'
        group by materias.nombre_materia');
        // dump($datos);
        $puntos = [];
        foreach ($datos as $dato) {
            $puntos[] = array('name'=>$dato->nombre_materia, 'y'=>floatval($dato->count));
        }
        // dd($puntos);
        $docentes = DB::select('select ma.nombre_materia,ma.sigla,d.periodo
            from docente_materia d
            inner join materias ma
            on ma.id = d.materia_id
            where d.docente_id = '.$id);
        return view('admin.reportes.repoVerDocente', ['docentes' => $docentes, "data"=>json_encode($puntos)]);
    }
}
