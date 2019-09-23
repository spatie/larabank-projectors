<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class)->create([
            'name'  => 'User',
            'email' => 'user@larabank.com',
        ]);

        factory(User::class, 4)->create();
    }
}
