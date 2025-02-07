<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $company = Company::first();

        User::create([
            'username' => 'jede',
            'name' => 'jede',
            'email' => 'jede@gmail.com',
            'password' => Hash::make('password'),
            'date_of_birth' => $faker->date('Y-m-d', '1945-08-17'),
            'phone_number' => '123456789',
            'company_id' => $company->id, // Assign the company_id
            'role' => 'admin',
        ]);
        User::create([
            'username' => 'useruser',
            'name' => 'useruser',
            'email' => 'useruser@useruser.com',
            'password' => Hash::make('useruser'),
            'date_of_birth' => $faker->date('Y-m-d', '1945-08-17'),
            'phone_number' => '123456789',
            'company_id' => $company->id, // Assign the company_id
            'role' => 'user',
        ]);

    }
}
