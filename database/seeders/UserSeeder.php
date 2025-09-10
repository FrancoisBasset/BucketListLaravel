<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(): void {
        collect(['francois', 'Chochodile', 'Pikachu'])->each(function ($username) {
            User::create([
                'username' => $username,
                'password' => Hash::make('password123$')
            ]);
        });
    }
}
