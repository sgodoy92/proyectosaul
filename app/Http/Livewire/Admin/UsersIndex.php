<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;
class UsersIndex extends Component
{
    use WithPagination;

    public $search;
    protected $paginationTheme = "bootstrap";

    //Se activa cuando la propiedad search cambie
    public function updatingSearch(){
        //A medida que vaya escribiendo se elimina la inf de la pagina hasta que lo encuentre
        $this->resetPage();
    }

    public function render()
    {
        
        
        $users = User::where('name', 'LIKE','%' . $this->search . '%')
        ->orWhere('email', 'LIKE', '%' . $this->search . '%')
        ->latest('id')
        ->paginate();
        
        return view('livewire.admin.users-index', compact('users'));
    }
}
