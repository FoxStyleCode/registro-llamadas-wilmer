<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Llamada;

class Llamadas extends Component
{

    // public $count = 0;
 
    // public function increment()
    // {
    //     $this->count++;
    // 

    public function render()
    {
        // $this->llamadas = Llamada::all();
        return view('livewire.llamadas');
    }
    
    
}
