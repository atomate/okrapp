<?php

namespace Database\Factories;

use App\Models\Result;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Result>
 */
class ResultFactory extends Factory
{
    protected $model = Result::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(7),
            'progress' => $this->faker->numberBetween(1,100),
        ];
    }
}
