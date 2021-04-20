<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
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
        DB::table('students')->insert([
            [
                'nisn' => '0038292837',
                'nis' => '13474837',
                'name' => 'Alice',
                'gender' => 1,
                'birthdate' => $faker->date,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'fee_id' => 1,
                'class_id' => 1,
                'updated_at' => now(),
                'password' => Hash::make('0038292837'),
            ],
            [
                'nisn' => '0038292838',
                'nis' => '13474838',
                'name' => 'Saya',
                'gender' => 1,
                'birthdate' => $faker->date,
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'fee_id' => 2,
                'class_id' => 2,
                'updated_at' => now(),
                'password' => Hash::make('0038292838'),
            ],
        ]);
    }
}
