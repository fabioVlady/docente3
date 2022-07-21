<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanRequest;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    
    public function store(PlanRequest $request){
        // dd($request);
        Plan::create($request->all());
        return response()->json(true);
    }
    
    public function update(PlanRequest $request){
        $event = Plan::where('id',$request->id)->first();
        $event->fill($request->all());
        $event->save();
        return response()->json(true);
    }
    
    public function destroy(Request $request)
    {
        Plan::where('id', $request->id)->delete();

        return response()->json(true);
    }
}
