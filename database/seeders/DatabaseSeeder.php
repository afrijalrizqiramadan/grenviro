<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
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

        $this->call(UserRolePermissionSeeder::class);
        $this->call(AutoSettingsSeeder::class);
        $this->call(CustomersSeeder::class);
        $this->call(DataAktuatorSeeder::class);
        $this->call(DataSensorSeeder::class);
        $this->call(DevicesSeeder::class);
        $this->call(DeliveryStatusSeeder::class);
        $this->call(MaintenancesSeeder::class);
        $this->call(TechniciansSeeder::class);
    }
}
