<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>Str::uuid(), "name"=>"System Admin","email"=>"admin1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>1, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Regulations & Compliance Officer","email"=>"compliance1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>2, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Regulations Officer","email"=>"inspection1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>3, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Quality Control Officer","email"=>"qualitycontrol1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>4, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Marketing Officer","email"=>"marketing1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>5, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Data & GIS Officer","email"=>"data1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>6, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Finance Officer","email"=>"finance1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>7, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Regional Officers","email"=>"regional1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>8, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Chief Executive Officer","email"=>"ceo1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>9, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
            ["id"=>Str::uuid(), "name"=>"Coffee Grower","email"=>"grower1@konza.go.ke","password"=>Hash::make("Incorrect"),"role_id"=>10, "email_verified_at"=>now(),"remember_token"=>Str::random(50),"created_at"=>now()],
        ];
        User::insert($items);
    }
}
