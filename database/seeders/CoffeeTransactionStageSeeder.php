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
            ["id"=>1, "name"=>"Aggregation", "alias"=>"Aggregate", "abbreviation"=>"AGG", "created_at"=>now()],
            ["id"=>2, "name"=>"Processing", "alias"=>"Process", "abbreviation"=>"PRC", "created_at"=>now()],
            ["id"=>3, "name"=>"Milling", "alias"=>"Mill", "abbreviation"=>"MIL", "created_at"=>now()],
            ["id"=>4, "name"=>"Warehouse", "alias"=>"Warehouse", "abbreviation"=>"WH", "created_at"=>now()],
        ];

        CoffeeTransactionStage::insert($items);
    }
}
