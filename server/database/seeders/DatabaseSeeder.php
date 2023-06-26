<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Administrator;
use App\Models\Financial;
use App\Models\Moderator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        /**
         * USUARIO ADMINISTRADOR
         */
         $userAdmin = \App\Models\User::factory()->create([
             'name' => 'admin',
             'email' => 'admin@email.com',
             'password' => bcrypt('12345'),
             'user_level' => 'administrator'
         ]);

         $administrator = new Administrator();
         $administrator->user_id = $userAdmin->id;
         $administrator->save();

        /**
         * USUARIO MODERADOR
         */
        $userMod = \App\Models\User::factory()->create([
            'name' => 'mod',
            'email' => 'mod@email.com',
            'password' => bcrypt('12345'),
            'user_level' => 'moderator'
        ]);

        $moderator = new Moderator();
        $moderator->user_id = $userMod->id;
        $moderator->save();

        /**
         * USUARIO FINANCEIRO
         */
        $userFinancial = \App\Models\User::factory()->create([
            'name' => 'financial',
            'email' => 'financial@admin.com',
            'password' => bcrypt('12345'),
            'user_level' => 'financial'
        ]);

        $financial = new Financial();
        $financial->user_id = $userFinancial->id;
        $financial->save();
    }
}
