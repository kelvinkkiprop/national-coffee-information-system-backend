<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\Region;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>1, "name"=>"Coast", "created_at"=>now()],
            ["id"=>2, "name"=>"North Eastern", "created_at"=>now()],
            ["id"=>3, "name"=>"Eastern", "created_at"=>now()],
            ["id"=>4, "name"=>"Central", "created_at"=>now()],
            ["id"=>5, "name"=>"Rift Valley", "created_at"=>now()],
            ["id"=>6, "name"=>"Western", "created_at"=>now()],
            ["id"=>7, "name"=>"Nyanza", "created_at"=>now()],
            ["id"=>8, "name"=>"Nairobi", "created_at"=>now()],
        ];
        Region::insert($items);
    }
}
