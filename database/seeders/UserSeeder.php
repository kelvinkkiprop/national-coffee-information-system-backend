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
        //Default
        $items = [
            ['id'=>Str::uuid(), 'name'=>'System Admin','email'=>'admin1@konza.go.ke','password'=>Hash::make('Incorrect'),'role_id'=>1, 'email_verified_at'=>now(),'remember_token'=>Str::random(50),'created_at'=>now()]

        ];
        User::insert($items);
    }
}
