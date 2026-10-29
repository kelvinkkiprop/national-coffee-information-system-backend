<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\County;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
           ["id"=> 1, "region_id"=>1, "name"=>"Mombasa", "created_at"=>now()],
           ["id"=> 2, "region_id"=>1, "name"=>"Kwale", "created_at"=>now()],
           ["id"=> 3, "region_id"=>1, "name"=>"Kilifi", "created_at"=>now()],
           ["id"=> 4, "region_id"=>1, "name"=>"Tana River", "created_at"=>now()],
           ["id"=> 5, "region_id"=>1, "name"=>"Lamu", "created_at"=>now()],
           ["id"=> 6, "region_id"=>1, "name"=>"Taita Taveta", "created_at"=>now()],
           ["id"=> 7, "region_id"=>2, "name"=>"Garissa", "created_at"=>now()],
           ["id"=> 8, "region_id"=>2, "name"=>"Wajir", "created_at"=>now()],
           ["id"=> 9, "region_id"=>2, "name"=>"Mandera" , "created_at"=>now()],
           ["id"=>10, "region_id"=>3, "name"=>"Marsabit", "created_at"=>now()],
           ["id"=>11, "region_id"=>3, "name"=>"Isiolo", "created_at"=>now()],
           ["id"=>12, "region_id"=>3, "name"=>"Meru", "created_at"=>now()],
           ["id"=>13, "region_id"=>3, "name"=>"Tharaka Nithi", "created_at"=>now()],
           ["id"=>14, "region_id"=>3, "name"=>"Embu", "created_at"=>now()],
           ["id"=>15, "region_id"=>3, "name"=>"Kitui", "created_at"=>now()],
           ["id"=>16, "region_id"=>3, "name"=>"Machakos", "created_at"=>now()],
           ["id"=>17, "region_id"=>3, "name"=>"Makueni", "created_at"=>now()],
           ["id"=>18, "region_id"=>4, "name"=>"Nyandarua", "created_at"=>now()],
           ["id"=>19, "region_id"=>4, "name"=>"Nyeri", "created_at"=>now()],
           ["id"=>20, "region_id"=>4, "name"=>"Kirinyaga", "created_at"=>now()],
           ["id"=>21, "region_id"=>4, "name"=>"Murang'a", "created_at"=>now()],
           ["id"=>22, "region_id"=>4, "name"=>"Kiambu", "created_at"=>now()],
           ["id"=>23, "region_id"=>5, "name"=>"Turkana", "created_at"=>now()],
           ["id"=>24, "region_id"=>5, "name"=>"West Pokot", "created_at"=>now()],
           ["id"=>25, "region_id"=>5, "name"=>"Samburu", "created_at"=>now()],
           ["id"=>26, "region_id"=>5, "name"=>"Trans Nzoia", "created_at"=>now()],
           ["id"=>27, "region_id"=>5, "name"=>"Uasin Gishu", "created_at"=>now()],
           ["id"=>28, "region_id"=>5, "name"=>"Elgeyo-Marakwet", "created_at"=>now()],
           ["id"=>29, "region_id"=>5, "name"=>"Nandi", "created_at"=>now()],
           ["id"=>30, "region_id"=>5, "name"=>"Baringo", "created_at"=>now()],
           ["id"=>31, "region_id"=>5, "name"=>"Laikipia", "created_at"=>now()],
           ["id"=>32, "region_id"=>5, "name"=>"Nakuru", "created_at"=>now()],
           ["id"=>33, "region_id"=>5, "name"=>"Narok", "created_at"=>now()],
           ["id"=>34, "region_id"=>5, "name"=>"Kajiado", "created_at"=>now()],
           ["id"=>35, "region_id"=>5, "name"=>"Kericho", "created_at"=>now()],
           ["id"=>36, "region_id"=>5, "name"=>"Bomet", "created_at"=>now()],
           ["id"=>37, "region_id"=>6, "name"=>"Kakamega", "created_at"=>now()],
           ["id"=>38, "region_id"=>6, "name"=>"Vihiga", "created_at"=>now()],
           ["id"=>39, "region_id"=>6, "name"=>"Bungoma", "created_at"=>now()],
           ["id"=>40, "region_id"=>6, "name"=>"Busia", "created_at"=>now()],
           ["id"=>41, "region_id"=>7, "name"=>"Siaya", "created_at"=>now()],
           ["id"=>42, "region_id"=>7, "name"=>"Kisumu", "created_at"=>now()],
           ["id"=>43, "region_id"=>7, "name"=>"Homa Bay", "created_at"=>now()],
           ["id"=>44, "region_id"=>7, "name"=>"Migori", "created_at"=>now()],
           ["id"=>45, "region_id"=>7, "name"=>"Kisii", "created_at"=>now()],
           ["id"=>46, "region_id"=>7, "name"=>"Nyamira", "created_at"=>now()],
           ["id"=>47, "region_id"=>8, "name"=>"Nairobi", "created_at"=>now()],
        ];

        County::insert($items);
    }
}
