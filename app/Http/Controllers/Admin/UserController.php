<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //Protege la ruta ppal Usuarios 
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit','update');
    }

    public function index()
    {
        return view ('admin.users.index');
    }


    public function edit(User $user)
    {
        //Recuperamos el listado de roles
        $roles = Role::all();
        //vista edit y le pasamos la información del usuario y del rol
        return view ('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user )
    {
        /*Relacionar un usuario con un rol
        sync coloca los registros en la tabla intermedia model_has_roles, y actualiza lo que el usuario
        selecciona */
        $user->roles()->sync($request->roles);

        //Cuando termina redirecciona a la ruta:
        return redirect()->route('admin.users.edit', $user)->with('info', 'Se asigno los roles correctamente');
    }


}
