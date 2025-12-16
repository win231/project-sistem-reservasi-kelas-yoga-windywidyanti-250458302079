<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1 Admin
        User::create([
            'name' => 'Admin Gymora',
            'email' => 'admin@gymora.com',
            'password' => Hash::make('password'), 
            'role' => 'admin',
            'gender' => 'male',
            'phone' => '081234567890',
        ]);

        // Instructors
            User::create([
                'name' => 'Instructor 1',
                'email' => 'instructor1@gymora.com',
                'password' => Hash::make('password'),
                'role' => 'instructor',
                'gender' => 'female',
                'phone' => '081234567891',
            ]);

            User::create([
                'name' => 'Instructor 2',
                'email' => 'instructor2@gymora.com',
                'password' => Hash::make('password'),
                'role' => 'instructor',
                'gender' => 'female',
                'phone' => '081234567892',
            ]);

            User::create([
                'name' => 'Instructor 3',
                'email' => 'instructor3@gymora.com',
                'password' => Hash::make('password'),
                'role' => 'instructor',
                'gender' => 'female',
                'phone' => '081234567893',
            ]);

        // Members
        //     User::create([
        //         'name' => 'Member',
        //         'email' => 'member@gymora.com',
        //         'password' => Hash::make('password'),
        //         'role' => 'member',
        //         'gender' => $i % 2 == 0 ? 'female' : 'male',
        //         'phone' => '0812345679' . str_pad($i, 2, '0', STR_PAD_LEFT),
        //     ]);
    }
}

