<?php

namespace Database\Factories;

use Faker\Generator;
use Illuminate\Database\Eloquent\Factories\Factory;

class SignUpPersonalWorkoutFactory extends Factory
{
    protected $faker;

    public function definition(): array
    {
        $faker = app(Generator::class);

        return [

        ];
    }
}