<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_carrera','descripcion','ubicacion','facultad_id'];

    //Relacion 1 a muchos (inversa)
    public function facultad(){
        return $this->belongsTo(Facultad::class);
    }
}
