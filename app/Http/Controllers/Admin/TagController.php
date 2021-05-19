<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
        //Proteger rutas
        public function __construct()
        {
            $this->middleware('can:admin.tags.index')->only('index');
            $this->middleware('can:admin.tags.create')->only('create','store');
            $this->middleware('can:admin.tags.edit')->only('edit','update');
            $this->middleware('can:admin.tags.destroy')->only('destroy');
        }

    public function index()
    {
        //Recogemos todos los tags
        $tags = Tag::all();
        //Retornamos la vista tag
        return view ('admin.tags.index', compact('tags'));
    }
    
    //Validación para crear formulario del Tag y comprobar que ya no exista una etiqueta existente
    public function create()
    {
        
        $colors = [
            'red'=> 'Color rojo',
            'yellow'=> 'Color amarillo',
            'green'=> 'Color verde',
            'blue'=> 'Color azul',
            'indigo'=> 'Color indigo',
            'purple'=> 'Color morado',
            'pink'=> 'Color rosa',

        ];
        return view ('admin.tags.create', compact('colors'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'slug' => 'required|unique:tags',
        'color' => 'required',
        ]);

       $tag = Tag::create($request->all());
       
       return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se creo con exito');
    }
    //Definimos los colores por defecto por cada etiqueta
    public function edit(Tag $tag)
    {
        $colors = [
            'red'=> 'Color rojo',
            'yellow'=> 'Color amarillo',
            'green'=> 'Color verde',
            'blue'=> 'Color azul',
            'indigo'=> 'Color indigo',
            'purple'=> 'Color morado',
            'pink'=> 'Color rosa',

        ];
        //Retornamos la vista tag y recuperamos la información de tag y colors
        return view ('admin.tags.edit', compact('tag', 'colors'));
    }

    public function update(Request $request, Tag $tag)
    {
        //Validación para actualizar formulario del Tag y comprobar que ya no exista una etiqueta existente
        $request->validate([
            'name' => 'required', 
            'slug' => "required|unique:tags,slug,$tag->id",
            'color'=> 'required',
         ]);
             $tag->update($request->all());
             return redirect()->route('admin.tags.edit', $tag)->with('info', 'La etiqueta se actualizo con exito');
    }


    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info', 'La etiqueta se elimino con exito');
    }
}
