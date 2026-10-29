<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            // Internal
            ["id"=> 1, "type_id"=>1, "name"=>"System Admin", "alias"=>"Admin", "created_at"=>now()],
            ["id"=> 2, "type_id"=>1, "name"=>"Regulations & Compliance Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 3, "type_id"=>1, "name"=>"Inspection Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 4, "type_id"=>1, "name"=>"Quality Control Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 5, "type_id"=>1, "name"=>"Marketing Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 6, "type_id"=>1, "name"=>"Data & GIS Officer", "alias"=>"Admin", "created_at"=>now()],
            ["id"=> 7, "type_id"=>1, "name"=>"Finance Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 8, "type_id"=>1, "name"=>"Regional Officers", "alias"=>"Field Officers", "created_at"=>now()],
            ["id"=> 9, "type_id"=>1, "name"=>"Chief Executive Officer", "alias"=>"CEO", "created_at"=>now()],

            // External
            ["id"=>10, "type_id"=>2, "name"=>"Grower Miller", "alias"=>null, "created_at"=>now()],
            ["id"=>11, "type_id"=>2, "name"=>"Co-operative Society", "alias"=>null, "created_at"=>now()],
            ["id"=>12, "type_id"=>2, "name"=>"Coffee Association", "alias"=>null, "created_at"=>now()],
            ["id"=>13, "type_id"=>2, "name"=>"Coffee Union", "alias"=>null, "created_at"=>now()],
            ["id"=>14, "type_id"=>2, "name"=>"Coffee Estates", "alias"=>null, "created_at"=>now()],
            ["id"=>15, "type_id"=>2, "name"=>"Nursery Operator", "alias"=>null, "created_at"=>now()],
            ["id"=>16, "type_id"=>2, "name"=>"Commercial Miller", "alias"=>null, "created_at"=>now()],
            ["id"=>17, "type_id"=>2, "name"=>"Warehouse", "alias"=>null, "created_at"=>now()],
            ["id"=>18, "type_id"=>2, "name"=>"Warehouse Operator", "alias"=>null, "created_at"=>now()],
            ["id"=>19, "type_id"=>2, "name"=>"Roaster", "alias"=>null, "created_at"=>now()],
            ["id"=>20, "type_id"=>2, "name"=>"Buyer", "alias"=>null, "created_at"=>now()],
            ["id"=>21, "type_id"=>2, "name"=>"Processed Coffee Importer", "alias"=>null, "created_at"=>now()],
            ["id"=>22, "type_id"=>2, "name"=>"Agent", "alias"=>null, "created_at"=>now()],
            ["id"=>23, "type_id"=>2, "name"=>"Independent Cupping Centre", "alias"=>null, "created_at"=>now()],
            ["id"=>24, "type_id"=>2, "name"=>"Coffee Storage Bags (Wholesalers, Manufacturers, Importers and Suppliers)", "alias"=>null, "created_at"=>now()],
            ["id"=>25, "type_id"=>2, "name"=>"Brokers", "alias"=>null, "created_at"=>now()],
            ["id"=>26, "type_id"=>2, "name"=>"Exchanges", "alias"=>null, "created_at"=>now()],
            ["id"=>27, "type_id"=>2, "name"=>"Central Settlement System Provider", "alias"=>null, "created_at"=>now()],
            ["id"=>28, "type_id"=>2, "name"=>"Coffee Training School", "alias"=>null, "created_at"=>now()],
            ["id"=>29, "type_id"=>2, "name"=>"Event Organisers", "alias"=>null, "created_at"=>now()],
            ["id"=>30, "type_id"=>2, "name"=>"Coffee Projects", "alias"=>null, "created_at"=>now()],
            ["id"=>31, "type_id"=>2, "name"=>"Transporter", "alias"=>null, "created_at"=>now()],
            ["id"=>32, "type_id"=>2, "name"=>"Input Supplier", "alias"=>null, "created_at"=>now()],
            ["id"=>33, "type_id"=>2, "name"=>"Certification Bodies", "alias"=>null, "created_at"=>now()],
            ["id"=>34, "type_id"=>2, "name"=>"NGOs", "alias"=>null, "created_at"=>now()],
            ["id"=>35, "type_id"=>2, "name"=>"County Governments", "alias"=>null, "created_at"=>now()],
            ["id"=>36, "type_id"=>2, "name"=>"Capital Market Authority", "alias"=>null, "created_at"=>now()],
            ["id"=>37, "type_id"=>2, "name"=>"Coffee Research and Training Institute", "alias"=>null, "created_at"=>now()],
            ["id"=>38, "type_id"=>2, "name"=>"Ministry of Co-operative", "alias"=>null, "created_at"=>now()],
            ["id"=>39, "type_id"=>2, "name"=>"Importers", "alias"=>null, "created_at"=>now()],
            ["id"=>40, "type_id"=>2, "name"=>"EU Operator & Regulators", "alias"=>null, "created_at"=>now()],

        ];
        Role::insert($items);
    }
}
