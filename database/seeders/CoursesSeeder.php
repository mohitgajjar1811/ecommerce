<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            ['course_name' => "Java",'created_at' => Carbon::now()],
            ['course_name' => "Python",'created_at' => Carbon::now()],
            ['course_name' => "Js Advance",'created_at' => Carbon::now()],
            ['course_name' => "Media",'created_at' => Carbon::now()],
          
        ]);
    }
}
