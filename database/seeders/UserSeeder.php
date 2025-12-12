<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Super Admin', 'email' => 'super@admin.com', 'password' => Hash::make('password'), 'role' => 'super admin'],
            ['name' => 'Manager', 'email' => 'manager@org.com', 'password' => Hash::make('password'), 'role' => 'manager'],
            ['name' => 'Staff', 'email' => 'staff@org.com', 'password' => Hash::make('password'), 'role' => 'staff'],
            ['name' => 'Finance', 'email' => 'finance@org.com', 'password' => Hash::make('password'), 'role' => 'finance'],
        ];

        foreach ($users as $user) {
            $user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['password'],
            ]);
            $user->assignRole($user['role']);
        }
    }
}
