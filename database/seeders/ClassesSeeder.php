<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            ['class_name' => "8th",'created_at' => Carbon::now()],
            ['class_name' => "9th",'created_at' => Carbon::now()],
            ['class_name' => "10th",'created_at' => Carbon::now()],
            ['class_name' => "11th",'created_at' => Carbon::now()],
            ['class_name' => "12th",'created_at' => Carbon::now()],
        ]);
    }
}
