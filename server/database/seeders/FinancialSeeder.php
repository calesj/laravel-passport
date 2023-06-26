<?php

namespace Database\Seeders;

use App\Models\Financial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FinancialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Financial::factory(10)->create();
    }
}
