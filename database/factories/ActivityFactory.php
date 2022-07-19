<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_event'=>$this->faker->userName,
            'fecha_event' => Carbon::now(),
            'description' => $this->faker->text(),
            'place'=> $this->faker->city(),
            'image' => defaultImgEvents(),
        ];
    }
}
