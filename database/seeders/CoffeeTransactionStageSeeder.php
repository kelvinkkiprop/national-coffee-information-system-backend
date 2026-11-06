<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\CoffeeTransactionStage;

class CoffeeTransactionStageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>1, "name"=>"Cooperative Aggregation", "alias"=>"Aggregated", "abbreviation"=>"AGG", "created_at"=>now()],
            ["id"=>2, "name"=>"Processing & Milling", "alias"=>"Procesed", "abbreviation"=>"PRC", "created_at"=>now()],
            ["id"=>3, "name"=>"Warehouse Bulking", "alias"=>"Bulked", "abbreviation"=>"BUL", "created_at"=>now()],
        ];

        CoffeeTransactionStage::insert($items);
    }
}
