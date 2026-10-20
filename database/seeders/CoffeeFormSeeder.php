<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\CoffeeForm;

class CoffeeFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Cherry', 'alias'=>'Cherries'],
            ['id'=>2, 'name'=>'Parchment', 'alias'=>'Parchments'],
            ['id'=>3, 'name'=>'Clean Coffee', 'alias'=>'Clean Coffee'],
        ];
        CoffeeForm::insert($items);
    }
}
