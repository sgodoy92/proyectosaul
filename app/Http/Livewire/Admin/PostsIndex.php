<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    //Se activa cuando la propiedad search cambie
    public function updatingSearch(){
        //A medida que vaya escribiendo se elimina la inf de la pagina hasta que lo encuentre
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::where('user_id', auth()->user()->id)
        ->where('name', 'LIKE','%' . $this->search . '%')
        ->latest('id')
        ->paginate();
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
