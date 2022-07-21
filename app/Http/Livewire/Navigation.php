<?php

namespace App\Http\Livewire;

use App\Models\Facultad;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $facultads = Facultad::all();
        
        return view('livewire.navigation', compact('facultads'));
    }
}
