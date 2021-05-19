<?php

namespace Database\Factories;
use App\Models\Categoria;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->sentence();
        return [
            //Datos aleatorios
            'name' => $name,
            'slug' => Str::slug($name),
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text(450),
            'status' => $this->faker->randomElement([1, 2]),
            //Asigna datos de usuario y categoria aleatorios para el post
            'user_id' => User::all()->random()->id,
            'categoria_id' => Categoria::all()->random()->id
        ];
    }
}
