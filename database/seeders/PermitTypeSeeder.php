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
            // 1.CoffeeBoard
            ["id"=> 1, "issuing_body_id"=>1, "name"=>"Import Permit", "alias"=>null, "index_number_prefix"=>"IM/P"],
            ["id"=> 2, "issuing_body_id"=>1, "name"=>"Export Permit", "alias"=>null, "index_number_prefix"=>"EX/P"],
            // 2.CountyGovernment
            ["id"=> 3, "issuing_body_id"=>2, "name"=>"Local Permit", "alias"=>null, "index_number_prefix"=>"L/P"],
        ];
        PermitType::insert($items);
    }
}
