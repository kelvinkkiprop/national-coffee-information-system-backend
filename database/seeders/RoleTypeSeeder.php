<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\RoleType;

class RoleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>1, "name"=>"Internal" ,"created_at"=>now()],
            ["id"=>2, "name"=>"External" ,"created_at"=>now()],
        ];
        RoleType::insert($items);
    }
}
