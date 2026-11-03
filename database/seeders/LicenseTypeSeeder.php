<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\LicenseType;

class LicenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            // 1.CoffeeBoard
            ["id"=> 1, "issuing_body_id"=>1, "name"=>"Agent Licence", "alias"=>null, "index_number_prefix"=>"LCN/A"],
            ["id"=> 2, "issuing_body_id"=>1, "name"=>"Buyer Licence", "alias"=>null, "index_number_prefix"=>"LCN/B"],
            ["id"=> 3, "issuing_body_id"=>1, "name"=>"Warehouse Operator Licence", "alias"=>null, "index_number_prefix"=>"LCN/WO"],
            ["id"=> 4, "issuing_body_id"=>1, "name"=>"Liquorer Licence", "alias"=>null, "index_number_prefix"=>"LCN/L"],
            ["id"=> 5, "issuing_body_id"=>1, "name"=>"Commercial Millers Licence", "alias"=>null, "index_number_prefix"=>"LCN/CM"],
            ["id"=> 6, "issuing_body_id"=>1, "name"=>"Independent Cupping Labs Licence", "alias"=>null, "index_number_prefix"=>"LCN/ICL"],
            // 2.CountyGovernment
            ["id"=> 7, "issuing_body_id"=>2, "name"=>"Pulping Station Licence", "alias"=>null, "index_number_prefix"=>"PS/LCN"],
            ["id"=> 8, "issuing_body_id"=>2, "name"=>"Grower Miller Licence", "alias"=>null, "index_number_prefix"=>"GM/LCN"],
            ["id"=> 9, "issuing_body_id"=>2, "name"=>"Warehouse Licence", "alias"=>null, "index_number_prefix"=>"W/LCN"],
            // 3.CapitalMarketsAuthority
            ["id"=>10, "issuing_body_id"=>3, "name"=>"Brokers Licence", "alias"=>null, "index_number_prefix"=>"BR/LCN"],
            // 4.CoffeeResearchandTrainingInstitute
            ["id"=>11, "issuing_body_id"=>4, "name"=>"Nursery Certificate", "alias"=>null, "index_number_prefix"=>"N/C"],
            // // 1.CoffeeBoard
            // // ["id"=>12, "issuing_body_id"=>1, "name"=>"Dealers Registration Certificate", "alias"=>null, "index_number_prefix"=>""],
            // ["id"=>13, "issuing_body_id"=>1, "name"=>"Coffee Barista Training Schools Registration Certificate", "alias"=>null, "index_number_prefix"=>"CBT/C"],
            // ["id"=>14, "issuing_body_id"=>1, "name"=>"Certification Bodies Registration Certificate", "alias"=>null, "index_number_prefix"=>"CBR/C"],
            // ["id"=>15, "issuing_body_id"=>1, "name"=>"Direct Sales Clearance Certificate", "alias"=>null, "index_number_prefix"=>"DSC/C"],
            // // 3.CountyGovernment
            // ["id"=>16, "issuing_body_id"=>3, "name"=>"Roasters Licence", "alias"=>null, "index_number_prefix"=>"R/C"],

        ];
        LicenseType::insert($items);
    }
}
