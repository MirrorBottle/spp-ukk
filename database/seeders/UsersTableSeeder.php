<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        // admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@ukk.com',
            'password' => Hash::make('secret'),
            'gender' => rand(0, 1),
            'birthdate' => $faker->date,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // staff
        DB::table('users')->insert([
            'name' => 'Staff',
            'email' => 'staff@ukk.com',
            'password' => Hash::make('secret'),
            'gender' => rand(0, 1),
            'birthdate' => $faker->date,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // admin
        DB::table('users')->insert([
            'name' => 'Alice',
            'email' => 'alice@ukk.com',
            'password' => Hash::make('secret'),
            'avatar' => 'Takigawa.Miu.600.2831124_1616943134.jpg',
            'gender' => rand(0, 1),
            'birthdate' => $faker->date,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
