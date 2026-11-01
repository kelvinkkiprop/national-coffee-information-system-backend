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
            // 1.Internal
            ["id"=> 1, "type_id"=>1, "name"=>"System Admin", "alias"=>"Admin", "created_at"=>now()],
            ["id"=> 2, "type_id"=>1, "name"=>"Regulations & Compliance Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 3, "type_id"=>1, "name"=>"Inspection Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 4, "type_id"=>1, "name"=>"Quality Control Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 5, "type_id"=>1, "name"=>"Marketing Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 6, "type_id"=>1, "name"=>"Data & GIS Officer", "alias"=>"Admin", "created_at"=>now()],
            ["id"=> 7, "type_id"=>1, "name"=>"Finance Officer", "alias"=>null, "created_at"=>now()],
            ["id"=> 8, "type_id"=>1, "name"=>"Regional Officers", "alias"=>"Field Officers", "created_at"=>now()],
            ["id"=> 9, "type_id"=>1, "name"=>"Chief Executive Officer", "alias"=>"CEO", "created_at"=>now()],

            // 2.External
            ["id"=>10, "type_id"=>2, "name"=>"Dealer", "alias"=>null, "created_at"=>now()],
            ["id"=>11, "type_id"=>2, "name"=>"Certification Bodies", "alias"=>null, "created_at"=>now()],
            ["id"=>12, "type_id"=>2, "name"=>"NGOs", "alias"=>null, "created_at"=>now()],
            ["id"=>13, "type_id"=>2, "name"=>"County Governments", "alias"=>null, "created_at"=>now()],
            ["id"=>14, "type_id"=>2, "name"=>"Capital Market Authority", "alias"=>null, "created_at"=>now()],
            ["id"=>15, "type_id"=>2, "name"=>"Coffee Research and Training Institute", "alias"=>null, "created_at"=>now()],
            ["id"=>16, "type_id"=>2, "name"=>"Ministry of Co-operative", "alias"=>null, "created_at"=>now()],
            ["id"=>17, "type_id"=>2, "name"=>"Importers", "alias"=>null, "created_at"=>now()],
            ["id"=>18, "type_id"=>2, "name"=>"EU Operator & Regulators", "alias"=>null, "created_at"=>now()],

        ];
        Role::insert($items);
    }
}
