<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    use HasFactory;
    protected $fillable = ['nombre_facultad','descripcion','ubicacion'];
    //Relacion de 1 a muchos
    public function carrera(){
        return $this->hasMany(Carrera::class);
    }
}
