<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            [
                'name' => "X RPL 1",
                'competition_id' => 1,
            ],
            [
                'name' => "XI RPL 1",
                'competition_id' => 1,
            ],
            [
                'name' => "X TKJ 1",
                'competition_id' => 3,
            ],
        ]);
    }
}
