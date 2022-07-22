<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContinuingEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_courses' => $this->faker->name,
            'fecha_courses' => Carbon::now(),
            'description' => $this->faker->text(),
            'place' => $this->faker->city,
            'cel_phone' => $this->faker->text(),
            'image' => defaultImgEvents(),
           
        ];
    }
}
