<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Persona;

class Docente extends Model
{
    use HasFactory;
    protected $fillable = ['item','grado','tipo','persona_id'];

    //Relacion 1 a 1 (Inversa)
    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    //Relacion muchos a muchos
    public function materias(){
        return $this->belongsToMany(Materia::class);
    }
}
