<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventoRequest;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function store(EventoRequest $request){
        Evento::create($request->all());
        return response()->json(true);
    }

    public function update(EventoRequest $request){
        var_dump($request->all());
        // $event = Evento::where('id',$request->id)->first();
        // $event->fill($request->all());
        // $event->save();

        // return response()->json(true);
    }
    public function destroy(Request $request)
    {
        Evento::where('id', $request->id)->delete();

        return response()->json(true);
    } 
}
