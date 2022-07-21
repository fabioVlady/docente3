<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente_materia extends Model
{
    protected $fillable = [
        'materia_id',
        'docente_id',
        'periodo',
        'inicio',
        'fin',
        'dia1',
        'hora_dia1',
        'dia2',
        'hora_dia2',
        'primer_parcial',
        'segundo_parcial',
        'examen_final'
    ];
    use HasFactory;
    protected $table="docente_materia";
}
