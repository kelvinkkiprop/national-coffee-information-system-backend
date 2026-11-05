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
            ["id"=>1, "name"=>"Cooperative Aggregation", "alias"=>'Aggregation', "index_number_prefix"=>"AG", "created_at"=>now()],
            ["id"=>2, "name"=>"Processing/Milling", "alias"=>'Processing/Milling', "index_number_prefix"=>"PR", "created_at"=>now()],
            ["id"=>3, "name"=>"Bulking/Export", "alias"=>'Export', "index_number_prefix"=>"EX", "created_at"=>now()],
        ];

        CoffeeTransactionStage::insert($items);
    }
}
