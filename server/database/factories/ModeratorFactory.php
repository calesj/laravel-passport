<?php

namespace Database\Factories;

use App\Models\Moderator;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Moderator>
 */
class ModeratorFactory extends Factory
{
    protected $model = Moderator::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(['user_level' => 'moderator',])->id
        ];
    }
}
