<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Main\DealershipCategory;

class DealershipCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=> 1, "name"=>"Nursery Operator", "alias"=>null, "created_at"=>now()],
            ["id"=> 2, "name"=>"Grower", "alias"=>null, "created_at"=>now()],
            ["id"=> 3, "name"=>"Grower Miller", "alias"=>null, "created_at"=>now()],
            ["id"=> 4, "name"=>"Commercial Miller", "alias"=>null, "created_at"=>now()],
            ["id"=> 5, "name"=>"Warehouse", "alias"=>null, "created_at"=>now()],
            ["id"=> 6, "name"=>"Warehouse Operator", "alias"=>null, "created_at"=>now()],
            ["id"=> 7, "name"=>"Roaster", "alias"=>null, "created_at"=>now()],
            ["id"=> 8, "name"=>"Buyer", "alias"=>null, "created_at"=>now()],
            ["id"=> 9, "name"=>"Processed Coffee Importer", "alias"=>null, "created_at"=>now()],
            ["id"=>10, "name"=>"Agent", "alias"=>null, "created_at"=>now()],
            ["id"=>11, "name"=>"Independent Cupping Centre", "alias"=>null, "created_at"=>now()],
            ["id"=>12, "name"=>"Coffee Storage Bags (Wholesalers, Manufacturers, Importers and Suppliers)", "alias"=>null, "created_at"=>now()],
            ["id"=>13, "name"=>"Co-operative Society", "alias"=>null, "created_at"=>now()],
            ["id"=>14, "name"=>"Coffee Association", "alias"=>null, "created_at"=>now()],
            ["id"=>15, "name"=>"Coffee Union", "alias"=>null, "created_at"=>now()],
            ["id"=>16, "name"=>"Coffee Estates", "alias"=>null, "created_at"=>now()],
            ["id"=>17, "name"=>"Brokers", "alias"=>null, "created_at"=>now()],
            ["id"=>18, "name"=>"Exchanges", "alias"=>null, "created_at"=>now()],
            ["id"=>19, "name"=>"Central Settlement System Provider", "alias"=>null, "created_at"=>now()],
            ["id"=>20, "name"=>"Coffee Training School", "alias"=>null, "created_at"=>now()],
            ["id"=>21, "name"=>"Event Organisers", "alias"=>null, "created_at"=>now()],
            ["id"=>22, "name"=>"Coffee Projects", "alias"=>null, "created_at"=>now()],
            ["id"=>23, "name"=>"Transporter", "alias"=>null, "created_at"=>now()],
            ["id"=>24, "name"=>"Input Supplier", "alias"=>null, "created_at"=>now()],

        ];
        DealershipCategory::insert($items);
    }
}
