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
           ["id"=> 1, "name"=>"Mombasa", "created_at"=>now()],
           ["id"=> 2, "name"=>"Kwale", "created_at"=>now()],
           ["id"=> 3, "name"=>"Kilifi", "created_at"=>now()],
           ["id"=> 4, "name"=>"Tana River", "created_at"=>now()],
           ["id"=> 5, "name"=>"Lamu", "created_at"=>now()],
           ["id"=> 6, "name"=>"Taita Taveta", "created_at"=>now()],
           ["id"=> 7, "name"=>"Garissa", "created_at"=>now()],
           ["id"=> 8, "name"=>"Wajir", "created_at"=>now()],
           ["id"=> 9, "name"=>"Mandera" , "created_at"=>now()],
           ["id"=>10, "name"=>"Marsabit", "created_at"=>now()],
           ["id"=>11, "name"=>"Isiolo", "created_at"=>now()],
           ["id"=>12, "name"=>"Meru", "created_at"=>now()],
           ["id"=>13, "name"=>"Tharaka Nithi", "created_at"=>now()],
           ["id"=>14, "name"=>"Embu", "created_at"=>now()],
           ["id"=>15, "name"=>"Kitui", "created_at"=>now()],
           ["id"=>16, "name"=>"Machakos", "created_at"=>now()],
           ["id"=>17, "name"=>"Makueni", "created_at"=>now()],
           ["id"=>18, "name"=>"Nyandarua", "created_at"=>now()],
           ["id"=>19, "name"=>"Nyeri", "created_at"=>now()],
           ["id"=>20, "name"=>"Kirinyaga", "created_at"=>now()],
           ["id"=>21, "name"=>"Murang'a", "created_at"=>now()],
           ["id"=>22, "name"=>"Kiambu", "created_at"=>now()],
           ["id"=>23, "name"=>"Turkana", "created_at"=>now()],
           ["id"=>24, "name"=>"West Pokot", "created_at"=>now()],
           ["id"=>25, "name"=>"Samburu", "created_at"=>now()],
           ["id"=>26, "name"=>"Trans Nzoia", "created_at"=>now()],
           ["id"=>27, "name"=>"Uasin Gishu", "created_at"=>now()],
           ["id"=>28, "name"=>"Elgeyo Marakwet", "created_at"=>now()],
           ["id"=>29, "name"=>"Nandi", "created_at"=>now()],
           ["id"=>30, "name"=>"Baringo", "created_at"=>now()],
           ["id"=>31, "name"=>"Laikipia", "created_at"=>now()],
           ["id"=>32, "name"=>"Nakuru", "created_at"=>now()],
           ["id"=>33, "name"=>"Narok", "created_at"=>now()],
           ["id"=>34, "name"=>"Kajiado", "created_at"=>now()],
           ["id"=>35, "name"=>"Kericho", "created_at"=>now()],
           ["id"=>36, "name"=>"Bomet", "created_at"=>now()],
           ["id"=>37, "name"=>"Kakamega", "created_at"=>now()],
           ["id"=>38, "name"=>"Vihiga", "created_at"=>now()],
           ["id"=>39, "name"=>"Bungoma", "created_at"=>now()],
           ["id"=>40, "name"=>"Busia", "created_at"=>now()],
           ["id"=>41, "name"=>"Siaya", "created_at"=>now()],
           ["id"=>42, "name"=>"Kisumu", "created_at"=>now()],
           ["id"=>43, "name"=>"Homa Bay", "created_at"=>now()],
           ["id"=>44, "name"=>"Migori", "created_at"=>now()],
           ["id"=>45, "name"=>"Kisii", "created_at"=>now()],
           ["id"=>46, "name"=>"Nyamira", "created_at"=>now()],
           ["id"=>47, "name"=>"Nairobi", "created_at"=>now()],
        ];

        County::insert($items);
    }
}
