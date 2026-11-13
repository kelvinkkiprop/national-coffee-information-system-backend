<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\UserStatus;

class UserStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>1, "name"=>"Inactive", "alias"=>"New", "created_at"=>now()],
            ["id"=>2, "name"=>"Active", "alias"=>"Activate", "created_at"=>now()],
            ["id"=>3, "name"=>"Disabled", "alias"=>"Disable", "created_at"=>now()],
        ];
        UserStatus::insert($items);
    }
}
