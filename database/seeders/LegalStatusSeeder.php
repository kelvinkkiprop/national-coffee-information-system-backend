<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\LegalStatus;

class LegalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>1, "name"=>"Private Firm" ,"created_at"=>now()],
            ["id"=>2, "name"=>"Partnerships" ,"created_at"=>now()],
            ["id"=>3, "name"=>"Co-operative society" ,"created_at"=>now()],
            ["id"=>4, "name"=>"Public Company" ,"created_at"=>now()],
            ["id"=>5, "name"=>"Parastatal" ,"created_at"=>now()],
            ["id"=>6, "name"=>"Individual" ,"created_at"=>now()],
            ["id"=>7, "name"=>"Relief Agency" ,"created_at"=>now()],
        ];
        LegalStatus::insert($items);

    }
}
