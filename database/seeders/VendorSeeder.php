<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;


class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vendors')->insert([
            ['name' => Str::random(10),'contact_person' => Str::random(10),'phone' => "1000000000",'email' => Str::random(5)."@gmail.com",'address' => Str::random(20),'created_at' => Carbon::now()],
            // ['name' => Str::random(10),'contact_person' => Str::random(10),'phone' => "4657891230",'email' => Str::random(5)."@gmail.com",'address' => Str::random(20),'created_at' => Carbon::now()],
            // ['name' => Str::random(10),'contact_person' => Str::random(10),'phone' => "5210369741",'email' => Str::random(5)."@gmail.com",'address' => Str::random(20),'created_at' => Carbon::now()],
            // ['name' => Str::random(10),'contact_person' => Str::random(10),'phone' => "1025369874",'email' => Str::random(5)."@gmail.com",'address' => Str::random(20),'created_at' => Carbon::now()],
            // ['name' => Str::random(10),'contact_person' => Str::random(10),'phone' => "5874120369",'email' => Str::random(5)."@gmail.com",'address' => Str::random(20),'created_at' => Carbon::now()],
            // ['name' => Str::random(10),'contact_person' => Str::random(10),'phone' => "5879632104",'email' => Str::random(5)."@gmail.com",'address' => Str::random(20),'created_at' => Carbon::now()],
            // ['name' => Str::random(10),'contact_person' => Str::random(10),'phone' => "9874510255",'email' => Str::random(5)."@gmail.com",'address' => Str::random(20),'created_at' => Carbon::now()],
    ]);
    }
}
