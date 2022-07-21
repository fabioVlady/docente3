<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_materia','descripcion','sigla','carrera_id'];

    //Relacion muchos a muchos
    public function docentes(){
        return $this->belongsToMany(Docente::class);
    }
}
