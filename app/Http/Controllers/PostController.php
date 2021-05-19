<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categoria;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 2)->latest('id')->paginate(8);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        //verificar metodo published para que solo pueda ver los posts publicados
        $this->authorize('published', $post);

        $similares = Post::where('categoria_id', $post->categoria_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id)
            ->latest('id')
            ->take(4)
            ->get();
        return view('posts.show', compact('post', 'similares'));
    }
    
    public function categoria(Categoria $categoria)
    {
        $posts = Post::where('categoria_id', $categoria->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(4);
            return view('posts.categoria', compact('posts', 'categoria'));
    }

    public function tag(Tag $tag) {
        
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);
            //Listado de posts, y la info de etiquetas 'tag'
            return view('posts.tag', compact('posts', 'tag'));
    }
}


