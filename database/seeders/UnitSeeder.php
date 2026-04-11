<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            ['name' => 'Pieces', 'short_name' => 'Pcs'],
            ['name' => 'Kilogram', 'short_name' => 'Kg'],
            ['name' => 'Litre', 'short_name' => 'Ltr'],
            ['name' => 'Box', 'short_name' => 'Box'],
            ['name' => 'Meter', 'short_name' => 'Mtr'],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
