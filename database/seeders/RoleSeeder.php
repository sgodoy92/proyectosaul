<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        //Permite que se le active o vea la opción Dashboard en el menú cuando inicie sesión
        Permission::create(['name' => 'admin.home',
                            'description'=>'Ver el dashboard'])->syncRoles([$role1, $role2]);

        //Permisos para Admins
        
        Permission::create(['name' => 'admin.users.index',
                            'description'=>'Ver listado de usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.users.edit',
                            'description'=>'Asignar un rol'])->syncRoles([$role1]);

        //Permisos roles
        Permission::create(['name' => 'admin.roles.index',
                            'description'=>'Ver listado de roles'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.create',
                            'description'=>'Crear rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.edit',
                            'description'=>'Editar rol'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.roles.destroy',
                            'description'=>'Eliminar listado de rol'])->syncRoles([$role1]);



        //Permisos CATEGORIAS
        Permission::create(['name' => 'admin.categorias.index',
                            'description'=>'Ver listado de categorias'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.categorias.create',
                            'description'=>'Crear categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categorias.edit',
                            'description'=>'Editar categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.categorias.destroy',
                            'description'=>'Eliminar listado de categorias'])->syncRoles([$role1]);

        //Permisos ETIQUETAS
        Permission::create(['name' => 'admin.tags.index',
                            'description'=>'Ver listado de etiquetas'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.tags.create',
                            'description'=>'Crear etiquetas'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.edit',
                            'description'=>'Editar etiquetas'])->syncRoles([$role1]);

        Permission::create(['name' => 'admin.tags.destroy',
                            'description'=>'Eliminar etiquetas'])->syncRoles([$role1]);

        //Permisos POSTS, para blogger=$role2
        Permission::create(['name' => 'admin.posts.index',
                            'description'=>'Ver listado de posts'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.posts.create',
                            'description'=>'Crear posts'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.posts.edit',
                            'description'=>'Editar posts'])->syncRoles([$role1, $role2]);

        Permission::create(['name' => 'admin.posts.destroy',
                            'description'=>'Eliminar posts'])->syncRoles([$role1, $role2]);
                      
    }
}
