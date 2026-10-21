<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Permits', 'description'=>null],
            ['id'=>2, 'name'=>'Licenses', 'description'=>null],
        ];
        Service::insert($items);

    }
}
