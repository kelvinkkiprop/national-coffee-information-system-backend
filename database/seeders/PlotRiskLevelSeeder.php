<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\PlotRiskLevel;

class PlotRiskLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>1, "name"=>"Very Low", "alias"=>"VL", "created_at"=>now()],
            ["id"=>2, "name"=>"Low", "alias"=>"L", "created_at"=>now()],
            ["id"=>3, "name"=>"Moderate", "alias"=>"M", "created_at"=>now()],
            ["id"=>4, "name"=>"High", "alias"=>"H", "created_at"=>now()],
            ["id"=>5, "name"=>"Very High", "alias"=>"VH", "created_at"=>now()],
        ];
        PlotRiskLevel::insert($items);
    }
}
