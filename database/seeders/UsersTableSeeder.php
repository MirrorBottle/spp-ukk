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
            'username' => 'admin',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 1,
        ]);
        // staff
        DB::table('users')->insert([
            'name' => 'Staff',
            'username' => 'staff',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 2,
        ]);
        // admin
        DB::table('users')->insert([
            'name' => 'Alice',
            'username' => 'alice',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 2,
        ]);
    }
}
