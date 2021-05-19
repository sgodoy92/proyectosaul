<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Categoria;

class CategoriaController extends Controller
{
    //Proteger rutas
    public function __construct()
    {
        $this->middleware('can:admin.categorias.index')->only('index');
        $this->middleware('can:admin.categorias.create')->only('create','store');
        $this->middleware('can:admin.categorias.edit')->only('edit','update');
        $this->middleware('can:admin.categorias.destroy')->only('destroy');
    }

    //Retorna las vistas
    public function index()
    {
        $categorias = Categoria::all();
        return view ('admin.categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view ('admin.categorias.create');

    }

    public function store(Request $request)
    {
    //Campo name y slug va ser requerido y comprobamos que no esté repetido
        $request->validate([
           'name' => 'required', 
           'slug' => 'required|unique:categorias' 
        ]);
      
        //Creamos los datos con lo que el usuario nos envia $request
        $categoria = Categoria::create($request->all());
        return redirect()->route('admin.categorias.edit', $categoria)->with('info', 'La categoria se agrego con exito');
    }

    public function edit(Categoria $categoria)
    {
        return view ('admin.categorias.edit', compact ('categoria'));

    }

    public function update(Request $request,Categoria $categoria)
    {
        $request->validate([
            'name' => 'required',
            //Comprobamos sea requerido y que no exista otra categoría igual
            'slug' => "required|unique:categorias,slug,$categoria->id",
         ]);
       
             $categoria -> update($request->all());
             return redirect()->route('admin.categorias.edit', $categoria)->with('info', 'La categoria se actualizo con exito');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('admin.categorias.index')->with('info', 'La categoria se elimino con exito');
    }
}
