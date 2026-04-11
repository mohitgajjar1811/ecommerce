<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('teachers')->insert([
            ['name' => Str::random(10),'email_id' => Str::random(5)."@gmail.com",'subject' => "Gujarati",'created_at' => Carbon::now()],
            ['name' => Str::random(10),'email_id' => Str::random(5)."@gmail.com",'subject' => "English",'created_at' => Carbon::now()],
            ['name' => Str::random(10),'email_id' => Str::random(5)."@gmail.com",'subject' => "Maths",'created_at' => Carbon::now()],
            ['name' => Str::random(10),'email_id' => Str::random(5)."@gmail.com",'subject' => "Science",'created_at' => Carbon::now()],
            ['name' => Str::random(10),'email_id' => Str::random(5)."@gmail.com",'subject' => "Hindi",'created_at' => Carbon::now()],
    ]);
    }
}
