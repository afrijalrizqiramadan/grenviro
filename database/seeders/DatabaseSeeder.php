<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

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
        $this->call([
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
        ]);
        $this->call(AdministratorsSeeder::class);
        $this->call(AutoSettingsSeeder::class);
        $this->call(CenterPointSeeder::class);
        $this->call(CustomersSeeder::class);
        $this->call(DataAktuatorsSeeder::class);
        $this->call(DataSensorsSeeder::class);
        $this->call(DeliveryStatusSeeder::class);
        $this->call(DevicesSeeder::class);
        $this->call(HistorySensorsSeeder::class);
        $this->call(MaintenancesSeeder::class);
        $this->call(TechniciansSeeder::class);
        $this->call(UserRolePermissionSeeder::class);
    }
}
