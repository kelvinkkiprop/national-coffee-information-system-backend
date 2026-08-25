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
            ['id'=>1, 'name'=>'Admin','created_at'=>now()],
            ['id'=>2, 'name'=>'HDSE','created_at'=>now()],
            ['id'=>3, 'name'=>'Regional Supervisor','created_at'=>now()],
            ['id'=>4, 'name'=>'RDE','created_at'=>now()],
            ['id'=>5, 'name'=>'CDE','created_at'=>now()],
            ['id'=>6, 'name'=>'SCDE','created_at'=>now()],
            ['id'=>7, 'name'=>'SCQASO','created_at'=>now()],
            ['id'=>8, 'name'=>'Senior School','created_at'=>now()],
            ['id'=>9, 'name'=>'Junior School','created_at'=>now()],
        ];
        Role::insert($items);
    }
}
