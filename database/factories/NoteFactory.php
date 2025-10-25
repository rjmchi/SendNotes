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
        $userId = User::all()->pluck('id')->toArray();
        $recipient = User::orderBy('random')->get();
        if ($recipient[0]->id != $userId){
            $email = $recipient[0]->email;
        }else {
            $email = $recipient[1]->email;
        }
        return [
            'title' => fake()->sentence(),
            'body'=> fake()->paragraph(),
            'send_date'=>fake()->dateTimeBetween('-1 day', '+1 week'),
            'user_id' => fake()->randomElement($userId),
            'recipient'=>  $email,
        ];
    }
}
