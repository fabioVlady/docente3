<?php

namespace App\Http\Livewire\Admin;

use App\Models\Carrera;
use App\Models\Facultad;
use Livewire\Component;

class CarrerasCreate extends Component
{
    public $selectedFacultad = null;
    public $carreras = null;
    public $selectedCarrera = null;


    public function render()
    {
        // $facultads = Facultad::all();
        $facultads = Facultad::pluck('nombre_facultad','id');
        return view('livewire.admin.carreras-create',compact('facultads'));
    }

    public function updatedselectedFacultad($facultad_id){
        // $carrera = DB::table("carreras")
        //             ->where("facultad_id",$id)
        //             ->pluck('nombre_carrera','id');
        $this->carreras = Carrera::where('facultad_id',$facultad_id)->pluck('nombre_carrera','id');
    }
}
