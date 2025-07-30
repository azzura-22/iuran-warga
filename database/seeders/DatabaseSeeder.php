<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'azzura',
            'username' => 'azzura',
            'password' => '123',
            'level' => 'warga'
        ]);
        User::create([
            'name' => 'admin',
            'username' => 'admin11',
            'password' => '222',
            'level' => 'admin'
        ]);
    }
}
