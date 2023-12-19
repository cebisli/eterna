<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            'name' =>"Test",
            'email' => "test@hotmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$HMYpJvRwbOIzXq34Io/1fO0zpegdT/rVTPgFFqOVRSRhyR370M6S.', // 123456789
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(1)->create();
    }
}
