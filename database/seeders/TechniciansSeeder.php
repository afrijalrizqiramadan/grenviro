<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechniciansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('technicians')->insert([
            [
                'id' => 1,
                'user_id' => 3,
                'name' => 'ramadan',
                'address' => 'malang',
                'phone_number' => NULL,
                'email' => 'ramadan@gmail.com',
                'join_date' => '2024-06-07',
                'specialization' => 'hardware',
                'license_number' => NULL,
                'employment_status' => 'active',
                'work_schedule' => NULL,
                'additional_info' => 'jawa timur',
            ],
        ]);
    }
}
