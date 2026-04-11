<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department')->insert([
            ['name' => "ABC",'created_at' => Carbon::now()],
            ['name' => "XYZ",'created_at' => Carbon::now()],
            ['name' => "QA",'created_at' => Carbon::now()],
            ['name' => "QC",'created_at' => Carbon::now()],
        ]);
    }
}
