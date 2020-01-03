<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::create([
            'name' => 'Administrator',
            'email' => 'admin@laramap.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'is_admin' => true,
            'is_verified' => true,
        ]);
    }
}
