<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::findOrFail(1)->assignRole('admin');
        User::findOrFail(2)->assignRole('staff');
    }
}
