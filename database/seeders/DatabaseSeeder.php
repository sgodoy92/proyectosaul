<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Tag;
use Illuminate\Database\Seeder;

USE Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Storage::Crea la el directorio posts que es donde se va a almacenar las imagenes
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        Categoria::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
