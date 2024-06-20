<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorySensorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('history_sensors')->insert([
            [
                'id' => 1,
                'device_id' => 1,
                'timestamp' => '2024-06-06 03:11:44',
                'pressure' => 38,
                'temperature' => 708,
            ],
            [
                'id' => 2,
                'device_id' => 2,
                'timestamp' => '2024-06-06 03:11:53',
                'pressure' => 11,
                'temperature' => 76,
            ],
            [
                'id' => 3,
                'device_id' => 3,
                'timestamp' => '2024-06-06 03:12:04',
                'pressure' => 38,
                'temperature' => 592,
            ],
            // Tambahkan data lainnya sesuai kebutuhan
            // ...
        ]);
    }
}
