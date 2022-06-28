<?php

namespace Database\Factories;

use App\Models\KeyResult;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KeyResult>
 */
class KeyResultFactory extends Factory
{
    protected $model = KeyResult::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'progress' => $this->faker->numberBetween(1,100),
        ];
    }
}
