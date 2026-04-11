<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('student')->insert([
            ['first_name' => "Mohan",'email_id' => 'mohan@gmail.com','class_id' => '1','course_id' => '1','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Rohan",'email_id' => 'Rohan@gmail.com','class_id' => '2','course_id' => '2','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Manish",'email_id' => 'Manish@gmail.com','class_id' => '3','course_id' => '3','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Lalit",'email_id' => 'Lalit@gmail.com','class_id' => '4','course_id' => '4','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Kanji",'email_id' => 'Kanji@gmail.com','class_id' => '5','course_id' => '2','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Manish",'email_id' => 'manish@gmail.com','class_id' => '1','course_id' => '1','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Monak",'email_id' => 'monak@gmail.com','class_id' => '2','course_id' => '2','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Ravi",'email_id' => 'ravi@gmail.com','class_id' => '3','course_id' => '3','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Jay",'email_id' => 'jay@gmail.com','class_id' => '4','course_id' => '4','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
            ['first_name' => "Deep",'email_id' => 'deep@gmail.com','class_id' => '5','course_id' => '2','created_at' => Carbon::now(),'gender' => 'Male','address' => Str::random(10)],
        ]);
    }
}
