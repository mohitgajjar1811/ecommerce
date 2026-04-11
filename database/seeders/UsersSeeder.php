<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['name' => "Mohan",'email' => 'mohan@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Rohan",'email' => 'rohan@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Vihan",'email' => 'vihan@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Deep",'email' => 'Deep@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Moulik",'email' => 'Moulik@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Ras",'email' => 'Ras@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Rahi",'email' => 'Rahi@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Mann",'email' => 'Mann@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Yogi",'email' => 'Yogi@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
            ['name' => "Jay",'email' => 'Jay@gmail.com','created_at' => Carbon::now(),'password'=>Hash::make('password')],
        ]);
    }
}
