<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employee')->insert([
            ['name' => Str::random(10),'email_id' => Str::random(5)."@gmail.com",'department_id' => "1",'created_at' => Carbon::now()],
            ['name' => Str::random(10),'email_id' => Str::random(6)."@gmail.com",'department_id' => "2",'created_at' => Carbon::now()],
            ['name' => Str::random(10),'email_id' => Str::random(7)."@gmail.com",'department_id' => "3",'created_at' => Carbon::now()],
            ['name' => Str::random(10),'email_id' => Str::random(10)."@gmail.com",'department_id' => "4",'created_at' => Carbon::now()],
            ['name' => Str::random(10),'email_id' => Str::random(10)."@gmail.com",'department_id' => "1",'created_at' => Carbon::now()],
        ]);
    }
}
