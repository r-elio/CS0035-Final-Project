<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'account_id' => 123,
            'name' => 'Admin',
            'password' => Hash::make('123'),
            'balance' => 0,
            'is_admin' => true,
        ]);

        User::insert([
            'account_id' => 201810373,
            'name' => 'User',
            'password' => Hash::make('password'),
            'balance' => 0,
            'is_admin' => false,
        ]);
    }
}
