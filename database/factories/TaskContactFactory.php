<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaskContact>
 */
class TaskContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'FullName'=>fake()->sentence(),
           'Email'=>fake()->email(),
           'Massage'=>fake()->paragraph(5)
        ];
    }
}
