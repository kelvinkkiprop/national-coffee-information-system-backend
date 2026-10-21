<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\Tariff;

class TariffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'service_id'=>1, 'code'=>1, 'name'=>'Movement Permit', 'amount'=>1],
            ['id'=>2, 'service_id'=>2, 'code'=>2, 'name'=>'Coffee License', 'amount'=>1],
        ];
        Tariff::insert($items);
    }
}
