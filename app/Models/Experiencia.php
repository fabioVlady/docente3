<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_empresa','tipo_institucion','cargo','funciones','fecha_inicio','fecha_fin','persona_id'];
    

    //Relacion 1 a muchos Inversa
    public function persona(){
        return $this->belongsTo(Persona::class);
    }

    //Relacion 1 a 1 polimorfica
    public function pdf(){
        return $this->morphOne(Pdf::class, 'pdfable');
    }
}
