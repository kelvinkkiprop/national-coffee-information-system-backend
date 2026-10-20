<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Others\PaymentStatus;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ['id'=>1, 'name'=>'Pending', 'alias'=>'Invoice'],
            ['id'=>2, 'name'=>'Settled', 'alias'=>'Receipt'],
        ];
        PaymentStatus::insert($items);
    }
}
