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
            ["id"=> 1, "type_id"=>1, "name"=>"System Admin", "alias"=>null, "created_at"=>now()],
            ["id"=> 2, "type_id"=>1, "name"=>"Compliance Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 3, "type_id"=>1, "name"=>"Regulations Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 4, "type_id"=>1, "name"=>"Finance Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 5, "type_id"=>1, "name"=>"Quality Control Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 6, "type_id"=>1, "name"=>"Director General / CEO", "alias"=>null, "created_at"=>now()],
            ["id"=> 7, "type_id"=>1, "name"=>"System Administrator (AFA IT)", "alias"=>null, "created_at"=>now()],

            // External
            ["id"=> 8, "type_id"=>2, "name"=>"Growers / Farmers", "alias"=>null, "created_at"=>now()],
            ["id"=> 9, "type_id"=>2, "name"=>"County Government", "alias"=>null, "created_at"=>now()],
            ["id"=>10, "type_id"=>2, "name"=>"Government - Ministry of Agriculture/Coffee Board", "alias"=>null, "created_at"=>now()],
            ["id"=>11, "type_id"=>2, "name"=>"Government - State Department of Cooperatives", "alias"=>null, "created_at"=>now()],
            ["id"=>12, "type_id"=>2, "name"=>"Government - KFS & DRSRS", "alias"=>null, "created_at"=>now()],
            ["id"=>13, "type_id"=>2, "name"=>"Nairobi Coffee Exchange (NCE)", "alias"=>null, "created_at"=>now()],
            ["id"=>14, "type_id"=>2, "name"=>"Broker, Miller & Warehouseman", "alias"=>null, "created_at"=>now()],
            ["id"=>15, "type_id"=>2, "name"=>"Buyer / Exporter / Importer", "alias"=>null, "created_at"=>now()],
            ["id"=>16, "type_id"=>2, "name"=>"Certification Body", "alias"=>null, "created_at"=>now()],
            ["id"=>17, "type_id"=>2, "name"=>"EU Operator & Regulator", "alias"=>null, "created_at"=>now()],
        ];
        Role::insert($items);
    }
}
