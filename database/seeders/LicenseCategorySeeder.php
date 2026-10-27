<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\LicenseCategory;

class LicenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'New', 'alias'=>null],
            ['id'=>2, 'name'=>'Renewal', 'alias'=>null],
        ];
        LicenseCategory::insert($items);
    }
}
