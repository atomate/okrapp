<?php

namespace Database\Factories;

use App\Models\Objective;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ObjectiveFactory extends Factory
{
    protected $model = Objective::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
