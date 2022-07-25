<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente;

class Persona extends Model
{
    use HasFactory;
    

    protected $fillable = ['nombres','paterno','materno','ci','extension','sexo','fecnac','user_id','url','perfil','habilidad','direccion','telefono','celular'];
    
    public function getRouteKeyName()
    {
        return "ci";
    }
    //relacion 1 a 1 inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function docente(){
        return $this->hasOne(Docente::class);
    }

    //Relacion 1 a muchos 
    public function formacion(){
        return $this->hasMany(Formacion::class);
    }
    public function experiencia(){
        return $this->hasMany(Experiencia::class);
    }
    public function curso_idioma(){
        return $this->hasMany(Curso_Idioma::class);
    }
    public function curso_extra(){
        return $this->hasMany(Curso_extra::class);
    }
    public function libro(){
        return $this->hasMany(Libro::class);
    }
}
