<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','editorial','gestion_publicacion','fecha_publicacion','edicion','persona_id'];
    
    //Relacion 1 a muchos Inversa
    public function persona(){
        return $this->belongsTo(Persona::class);
    }
}
