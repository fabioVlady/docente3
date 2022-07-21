<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index(){
        $cities = Carrera::whereHas('facultad_id', function ($query) {
            $query->whereId(request()->input('state_id', 0));
        })->pluck('nombre_carrera','id');

        return response()->json ($cities);
    }
}
