<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutosettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('autosettings')->insert([
            [
                'id' => 1,
                'device_id' => 4736757,
                'upper_limit' => 67.5,
                'lower_limit' => 50.5,
                'status' => 'aktif',
                'created_at' => '2024-06-07 02:01:50',
                'updated_at' => '2024-06-07 02:01:50',
            ],
            [
                'id' => 2,
                'device_id' => 2,
                'upper_limit' => 58.5,
                'lower_limit' => 50.5,
                'status' => 'aktif',
                'created_at' => '2024-06-07 02:01:50',
                'updated_at' => '2024-06-07 02:01:50',
            ],
        ]);
    }
}
