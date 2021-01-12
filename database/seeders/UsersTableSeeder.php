<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name'  => 'User',
            'password' => bcrypt('password'),
            'email' => 'freek@spatie.be',
        ]);

        User::factory()->count(4)->create();
    }
}
