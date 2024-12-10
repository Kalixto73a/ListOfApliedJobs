<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FollowFactory extends Factory
{
    public function definition(): array
    {
        return [
            'news'=>$this->faker->realText($maxNbChars = 200),
        ];
    }
}
