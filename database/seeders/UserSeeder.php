<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     //Crea un usuario ADMIN que nosotros definimos manualmente para poder hacer las pruebas
    public function run()
    {
        User::create([
            'name' => 'Saul Godoy',
            'email' => 'sgodoy@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
    //Crear 99 registros de usuario
        User::factory(99)->create();
    }
}