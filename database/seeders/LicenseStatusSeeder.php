<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\LicenseStatus;

class LicenseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Draft', 'alias'=>'Draft'],
            ['id'=>2, 'name'=>'Returned', 'alias'=>'Return'],
            ['id'=>3, 'name'=>'Under Review', 'alias'=>'To Review'],
            ['id'=>4, 'name'=>'Licensing Committee', 'alias'=>'Recommend to Licensing Committee'],
            ['id'=>5, 'name'=>'Approved', 'alias'=>'Approve'],
            ['id'=>6, 'name'=>'Rejected', 'alias'=>'Reject'],
            ['id'=>7, 'name'=>'Expired', 'alias'=>'Expired'],
        ];
        LicenseStatus::insert($items);
    }
}
