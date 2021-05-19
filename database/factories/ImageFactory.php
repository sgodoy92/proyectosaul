<?php

namespace Database\Factories;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // post/ -> toma la ruta y el significado false devuelve el nombredeimagen.jpg
            //640 ANCHO, 480 ALTO 
            'url' => 'posts/' . $this->faker->image('public/storage/posts', 640, 480, null, false)
        ];
    }
}
