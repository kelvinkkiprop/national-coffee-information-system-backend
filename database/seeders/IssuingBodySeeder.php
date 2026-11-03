<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Add
use App\Models\Settings\IssuingBody;

class IssuingBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default
        $items = [
            ["id"=>1, "name"=>"Coffee Board of Kenya", "alias"=>"CBK", "created_at"=>now()],
            ["id"=>2, "name"=>"County Government", "alias"=>"CG", "created_at"=>now()],
            ["id"=>3, "name"=>"Capital Markets Authority", "alias"=>"CMA", "created_at"=>now()],
            ["id"=>4, "name"=>"Coffee Research and Training Institute", "alias"=>"CRTI", "created_at"=>now()],
        ];
        IssuingBody::insert($items);
    }
}
