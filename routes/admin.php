<?php

use App\Http\Controllers\Admin\AdminReportesController;
use App\Http\Controllers\Admin\CarreraController;
use App\Http\Controllers\Admin\Curso_extraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonaController;
use App\Http\Controllers\Admin\Curso_IdiomaController;
use App\Http\Controllers\Admin\Docente_materiaController;
use App\Http\Controllers\Admin\DocenteController;
use App\Http\Controllers\Admin\EventoController;
use App\Http\Controllers\Admin\ExperienciaController;
use App\Http\Controllers\Admin\FacultadController;
use App\Http\Controllers\Admin\FormacionController;
use App\Http\Controllers\Admin\MateriaController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LibroController;
use App\Models\Evento;

Route::get('', [HomeController::class, 'index'])->name('admin.home');
Route::put('', [HomeController::class, 'update'])->name('admin.update');

//REPORTES
Route::get('pdf', [HomeController::class, 'pdf'])->name('admin.pdf');
Route::get('repoDocentes',[AdminReportesController::class, 'repoDocentes'])->name('admin.repoDocentes');
Route::get('repoVerDocente/{id}',[AdminReportesController::class, 'repoVerDocente'])->name('admin.repoVerDocente');
// Route::resource('personas', PersonaController::class)->names('admin.personas');

Route::resource('personas', PersonaController::class)->names('admin.personas');
// Route::resource('libros', LibroController::class)->names('admin.libros');
Route::resource('libros', LibroController::class)->names('admin.libros');


Route::resource('curso_idiomas', Curso_IdiomaController::class)->names('admin.curso_idiomas');

Route::resource('curso_extras', Curso_extraController::class)->names('admin.curso_extras');

Route::resource('formacions', FormacionController::class)->names('admin.formacions');

Route::resource('experiencias', ExperienciaController::class)->names('admin.experiencias');

Route::resource('docentes', DocenteController::class)->names('admin.docentes');

Route::resource('facultads', FacultadController::class)->names('admin.facultads');

Route::resource('carreras', CarreraController::class)->names('admin.carreras');

Route::resource('materias', MateriaController::class)->names('admin.materias');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');
//
Route::get('eventos/{docente_materia}/edit', [EventoController::class,'edit'])->name('admin.eventos.edit');
//
Route::resource('docente_materia', Docente_materiaController::class)->names('admin.docente_materia');
// Route::resource('eventos', EventoController::class)->names('admin.eventos');
Route::get('eventos', [EventoController::class, 'index'])->name('admin.eventos.index');
// RUTAS EVENTOS
Route::get('agenda/{id}', function($id){
	// return "Viendo la agenda de $id";
    $events = Evento::where('id_dicta',$id)->get();  //PARA LOS CASOS DE BUSCAR POR UN CAMPO ESPECIFICO

        // $events = Event::where('id',3)->get();  PARA LOS CASOS DE BUSCAR POR UN CAMPO ESPECIFICO
    return response()->json($events);
})->middleware('can:admin.home');
Route::get('/load-events',[EventoController::class,'load'])->name('routeLoadEvents');
Route::put('/event-update',[EventoController::class,'update'])->name('routeEventUpdate');
Route::post('/event-store',[EventoController::class,'store'])->name('routeEventStore');
Route::delete('/event-destroy',[EventoController::class,'destroy'])->name('routeEventDelete');

// RUTAS PARA EVENTOS RAPIDOS
Route::delete('/fast-event-destroy', [PlanController::class,'destroy'])->name('routeFastEventDelete');
Route::put('/fast-event-update', [PlanController::class,'update'])->name('routeFastEventUpdate');
Route::post('/fast-event-store',[PlanController::class,'store'])->name('routeFastEventStore');


// Route::get('/dropdown','DropdownController@index');
// Route::get('/docente_materia-data','Docente_materiaController@data');
// Route::get('/docente_materia2', [Docente_materiaController::class, 'data']);
Route::get('carrera/{id}', [Docente_materiaController::class, 'carrera']);
Route::get('materia/{id}', [Docente_materiaController::class, 'materia']);

Route::resource('roles', RoleController::class)->names('admin.roles');

// Route::get('carrera', [Docente_materiaController::class, 'facultad']);
// Route::get('admin.materias.carrera/{id}','MateriaController@carrera');

