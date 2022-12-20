<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url' => $this->faker->imageUrl(1024, 1024)
        ];

        /* No usado pues vamos a poner imagenes personalizadas de internet.
        $factory->state(Image::class,'imageProfile', function (Faker $faker){
            return [
                'url' => $faker->imageUrl(90, 90)
            ];
        });*/
    }
}
