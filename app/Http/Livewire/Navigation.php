<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
class Navigation extends Component
{
    public function render()
    {
        $categorias = Categoria::all();

        return view('livewire.navigation', compact('categorias'));

    }
}
