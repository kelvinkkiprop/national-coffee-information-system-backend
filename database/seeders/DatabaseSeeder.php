<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            UserStatusSeeder::class,
            RoleSeeder::class,
            RoleTypeSeeder::class,
            CountrySeeder::class,
            CountySeeder::class,
            SubCountySeeder::class,
            WardSeeder::class,
            LegalStatusSeeder::class,
            PaymentStatusSeeder::class,
            PermitStatusSeeder::class,
            PermitTypeSeeder::class,
            CoffeeSpeciesSeeder::class,
            CoffeeFormSeeder::class,
            ServiceSeeder::class,
            TariffSeeder::class,
        ]);

    }
}
