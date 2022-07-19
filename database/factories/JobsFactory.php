<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_enterprise'=>$this->faker->name,
            'market_stall' => $this->faker->name,
            'description' => $this->faker->text(),
            'city_origin' => $this->faker->address(),
            'workday'=> Carbon::now(),
            'phone_number' => 96115853,
            'email'=> $this->faker->email,
            'image' =>defaultImgJobs()
        ];
    }
}
