<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\WithPagination;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.personas.index')->only('index');
        $this->middleware('can:admin.personas.create')->only('create','store');
        $this->middleware('can:admin.personas.edit')->only('edit','update');
        $this->middleware('can:admin.personas.destroy')->only('destroy');

    }

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $personas = Persona::where('nombres','1')->latest('id')->paginate(3);
        $personas = Persona::all();
        return view('admin.personas.index', compact('personas'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $extensions = [
             'CH'=>'Chuquisaca',
             'LP'=>'La Paz',
             'CB'=>'Cochabamba',
             'OR'=>'Oruro',
             'PT'=>'Potosí',
             'TJ'=>'Tarija',
             'SC'=>'Santa Cruz',
             'BE'=>'Beni',
             'PD'=>'Pando',
        ];
        $sexos = [
            'Masculino' => 'Masculino',
            'Femenino' => 'Femenino',
        ];
        return view('admin.personas.create', compact('extensions','sexos'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'email' => 'email|required|unique:users',
            'nombres' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'ci' => 'required|unique:personas',
            'extension' => 'required',
            'sexo' => 'required',
            'fecnac' => 'required',
            // 'user_id' => 'required',
            
        ]);
        $user = User::create([
            'name' => $request->get('nombres') . ' ' . $request->get('paterno') . ' ' . $request->get('materno'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('ci')),
        ]);
        $persona = Persona::create([
            'nombres' => $request->get('nombres'),
            'paterno' => $request->get('paterno'),
            'materno' => $request->get('materno'),
            'ci' => $request->get('ci'),
            'extension' => $request->get('extension'),
            'sexo' => $request->get('sexo'),
            'fecnac' => $request->get('fecnac'),
            'user_id' => $user->id,

        ]);
        
        return redirect()->route('admin.personas.edit', compact('persona'))->with('info','La persona se creo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return view('admin.personas.show', compact('persona'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {   $extensions = [
            'CH'=>'Chuquisaca',
            'LP'=>'La Paz',
            'CB'=>'Cochabamba',
            'OR'=>'Oruro',
            'PT'=>'Potosí',
            'TJ'=>'Tarija',
            'SC'=>'Santa Cruz',
            'BE'=>'Beni',
            'PD'=>'Pando',
        ];
        $sexos = [
            'Masculino' => 'Masculino',
            'Femenino' => 'Femenino',
        ];
        return view('admin.personas.edit', compact('persona','extensions','sexos'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'email' => "required|unique:users,email,$persona->user_id",
            'nombres' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'ci' => "required|unique:personas,ci,$persona->id",
            'extension' => 'required',
            'sexo' => 'required',
            'fecnac' => 'required',
        ]);
        // $user = User::all()->where('id',$persona->user_id);
        // $name = $request->get('nombres') . ' ' . $request->get('paterno') . ' ' . $request->get('materno');
    
        // $user->DB::table('users')->update ("update users set name = $name and email = $user->email where id = $persona->user_id");
        DB::table('users')
            ->where('id',$persona->user_id)
            ->update([ 
                'name' => $request->get('nombres') . ' ' . $request->get('paterno') . ' ' . $request->get('materno'),
                'email' => $request->get('email'),
                'password' =>bcrypt($request->get('ci'))
            ]);
        $persona->update($request->all());

        return redirect()->route('admin.personas.edit', $persona)->with('info','La persona se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        
        return redirect()->route('admin.personas.index')->with('info','La persona se Elimino con exito');
    }
}
