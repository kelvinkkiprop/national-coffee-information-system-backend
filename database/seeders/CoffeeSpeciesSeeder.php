<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\CoffeeSpecies;

class CoffeeSpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Arabica', 'alias'=>null],
            ['id'=>2, 'name'=>'Robusta', 'alias'=>null],
        ];
        CoffeeSpecies::insert($items);
    }
}
