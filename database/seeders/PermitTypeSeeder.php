<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\PermitType;

class PermitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Coffee Movement Permit for Local Market', 'alias'=>null],
            ['id'=>2, 'name'=>'Coffee Movement Permit for Exports', 'alias'=>null],
            ['id'=>3, 'name'=>'Coffee Movement Permit for Imports', 'alias'=>null],
        ];
        PermitType::insert($items);
    }
}
