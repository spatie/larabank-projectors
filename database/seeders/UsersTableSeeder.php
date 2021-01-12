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
            'email' => 'user@larabank.com',
        ]);

        User::factory()->count(4)->create();
    }
}
