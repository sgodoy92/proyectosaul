<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Crea 20 posts y a cada posts le asigna una imagen, y etiquetas aleatorias
       $posts = Post::factory(20)->create();

       foreach ($posts as $post){
           Image::factory(1)->create([
               'imageable_id' => $post->id,
               'imageable_type' => Post::class
           ]);
        //Genera dos etiquetas aleatorias por cada post
           $post->tags()->attach([
                rand(1, 4),
                rand(5, 8)
           ]);
       }
    }
}
