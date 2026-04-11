<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            ['title' => Str::random(10),'author' => Str::random(10),'price' => "100",'created_at' => Carbon::now()],
            ['title' => Str::random(10),'author' => Str::random(10),'price' => "200",'created_at' => Carbon::now()],
            ['title' => Str::random(10),'author' => Str::random(10),'price' => "300",'created_at' => Carbon::now()],
            ['title' => Str::random(10),'author' => Str::random(10),'price' => "400",'created_at' => Carbon::now()],
            ['title' => Str::random(10),'author' => Str::random(10),'price' => "500",'created_at' => Carbon::now()],
        ]);
    }
}
