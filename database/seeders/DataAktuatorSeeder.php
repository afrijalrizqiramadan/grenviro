<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataAktuatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_aktuator')->insert([
            [
                'id' => 1,
                'device_id' => 4736757,
                'buzzer' => 0,
                'heater' => 1,
            ],
            [
                'id' => 2,
                'device_id' => 2,
                'buzzer' => 0,
                'heater' => 1,
            ],
            [
                'id' => 3,
                'device_id' => 3,
                'buzzer' => 0,
                'heater' => 1,
            ],
        ]);
    }
}
