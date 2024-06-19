<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['voornaam' => "manager", 'achternaam' => 'manager', 'email' => 'manager@123.com',
            'password' => Hash::make('test'), 'role_name' => 'contentmanager'],
            ['voornaam' => "admin", 'achternaam' => 'admin', 'email' => 'admin@123.com',
            'password' => Hash::make('test'), 'role_name' => 'admin']
        ];

        foreach ($users as $user) {
            $newUser = new User();
            $newUser->voornaam = $user['voornaam'];
            $newUser->achternaam = $user['achternaam'];
            $newUser->email = $user['email'];
            $newUser->password = $user['password'];
            $newUser->role_name = $user['role_name'];
            $newUser->save();
            $newUser->assignRole($user['role_name']);
        }
    }
}
