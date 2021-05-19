<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Categoria;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    //Proteger rutas
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    public function index()
    {
        return view('admin.posts.index');
    }


    public function create(Post $post)
    {
        $categorias = Categoria::pluck('name','id');
        $tags = Tag::all();
        
        return view('admin.posts.create', compact('categorias','tags','post'));
    }

    public function store(PostRequest $request)
    {

        $post = Post::create($request->all());
        if($request->file('file')){
        $url = Storage::put('posts',$request->file('file'));

        $post->image()->create([
            'url' => $url
        ]);
        }

        //Actualiza etiqueta relacionada al post

        if($request->tags){
            $post->tags()->attach($request->tags);           
        }
        return redirect()->route('admin.posts.edit', $post);        
    }

    public function edit(Post $post)
    {
        $this->authorize('author', $post);
        $categorias = Categoria::pluck('name','id');
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categorias', 'tags'));
    }

    public function update(PostRequest $request, Post $post)
    {
        //$this->authorize('author', $post);
        
        //Extraemos/Recibimos la información del formulario
        $post->update($request->all());

        //Comprobamos si se esta mandando una imagen
        if ( $request->file('file')){
        //::put: Si se manda se sube al servidor
        //->file: Nombre de la carpeta de la imagen al servidor
        $url = Storage::put('posts', $request->file('file'));
        

        //Comprobamos si el post ya tenia imagen
        if($post->image){
        //si la tiene la borra
            Storage::delete($post->image->url);
            //y la subimos por la nueva imagen de cargar
            $post->image->update([
                'url' => $url
            ]);

        }
        //En el caso de que no este asociada ninguna imagen
        else {
            $post->image()->create([
                'url' => $url
            ]);
        }
    }
            //Actualiza etiqueta relacionada al post
            if($request->tags){
            //Sincroniza           
            $post->tags()->sync($request->tags);
            }

        return redirect()->route('admin.posts.edit', $post)->with('info','El post se actualizo exito');
    }

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('info','El post se elimino exito');
    }
}
