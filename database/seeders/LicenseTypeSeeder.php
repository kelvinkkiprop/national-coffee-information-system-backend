<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\LicenseType;

class LicenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Coffee Buyer', 'alias'=>null],
            ['id'=>2, 'name'=>'Coffee Warehouseman', 'alias'=>null],
            ['id'=>3, 'name'=>'Coffee Agent', 'alias'=>null],
            ['id'=>4, 'name'=>'Independent Cupping Labs', 'alias'=>null],
            ['id'=>5, 'name'=>'Coffee Liquoring', 'alias'=>null],
        ];
        LicenseType::insert($items);
    }
}
