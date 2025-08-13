<?php

namespace Database\Seeders;

use App\Models\categori;
use App\Models\member;
use App\Models\payment;
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
        categori::create([
            'priod' => 'mingguan',
            'nominal' => 100000,
        ]);
        member::create([
            'users_id' => 1,
            'name' => 'azzura',
            'no_telepon' => '08123456789',
            'alamat' => 'cikopi',
            'tanggal_lahir' => '2000-01-01',
            'categoris_id' => 1,
            'foto' => null,
        ]);
        member::create([
            'users_id' => 2,
            'name' => 'admin',
            'no_telepon' => '08123456789',
            'alamat' => 'cikopi',
            'tanggal_lahir' => '2000-01-01',
            'categoris_id' => 1,
            'foto' => null,
        ]);
        payment::create([
            'users_id' => 1,
            'categoris_id' => 1,
            'priod' => 'mingguan',
            'nominal' => 100000,
            'status' => '1',
        ]);
    }
}
