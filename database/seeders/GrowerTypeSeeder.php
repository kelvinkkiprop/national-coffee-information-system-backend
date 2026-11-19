<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\GrowerType;

class GrowerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>1, "name"=>"Co-operative Society", "alias"=>null, "created_at"=>now()],
            ["id"=>2, "name"=>"Coffee Association", "alias"=>null, "created_at"=>now()],
            ["id"=>3, "name"=>"Coffee Union", "alias"=>null, "created_at"=>now()],
            ["id"=>4, "name"=>"Coffee Estate", "alias"=>null, "created_at"=>now()],
        ];
        GrowerType::insert($items);
    }
}
