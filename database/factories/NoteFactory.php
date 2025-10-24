<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::all()->pluck('id')->toArray();
        return [
            'title' => fake()->sentence(),
            'body'=> fake()->paragraph(),
            'send_date'=>fake()->dateTimeBetween('-1 day', '+1 week'),
            'user_id' => fake()->randomElement($userIds),
        ];
    }
}
