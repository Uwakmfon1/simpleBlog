<?php

namespace Database\Factories;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $this->faker->locale('en_EN');

        return [
            'user_id'=>User::factory(),
            'title'=>$this->faker->sentence(3),
            'slug'=>$this->faker->sentence(3),
            'post' => $this->faker->sentences(10, true),
        ];
    }
}
