<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->insert([
            [
                'year' => now(),
                'fee' => 250000,
            ],
            [
                'year' => Carbon::now()->subYear(),
                'fee' => 280000,
            ],
        ]);
    }
}
