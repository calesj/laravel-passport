<?php

namespace Database\Factories;

use App\Models\Financial2;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Financial>
 */
class Financial2Factory extends Factory
{
    protected $model = Financial2::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(['user_level' => 'financial_2',])->id
        ];
    }
}
