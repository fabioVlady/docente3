<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacion extends Model
{
    use HasFactory;
    protected $fillable = ['nivel_estudio','institucion','fecha_inicio','fecha_fin','persona_id'];
    // Esto me esta causando error
    // public function getRouteKeyName()
    // {
    //     return 'nivel_estudio';
    // }

    //Relacion 1 a muchos Inversa
    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    //Relacion 1 a 1 polimorfica
    public function pdf(){
        return $this->morphOne(Pdf::class, 'pdfable');
    }
}
