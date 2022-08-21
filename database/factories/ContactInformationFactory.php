<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'enrollment' => $this->faker->regexify("[1-2]{1}[9]{1}270[0-9]{3}"),
            'address'=> $this->faker->address,
            'second_email'=> $this->faker->safeEmail,
            'date_graduate'=> Carbon::now(),
            'phone_house'=> $this->faker->regexify("[0-9]{8}"),
            'user_id'=> 1,
        ];
    }
}
