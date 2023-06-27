<?php

namespace Database\Seeders;

use App\Models\Financial2;
use Illuminate\Database\Seeder;

class Financial2Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Financial2::factory(10)->create();
    }
}
