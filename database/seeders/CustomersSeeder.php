<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'id' => 1,
                'user_id' => 2,
                'name' => 'rizqi',
                'address' => 'Jalan Mertojoyo Malang',
                'telp' => 812345678,
                'email' => 'aiyothings@gmail.com',
                'location' => 'Al Mahira',
                'maps' => 'https://www.google.com/maps/place/Nasi+Padang+Restu+Bundo+jl+Mertojoyo+no+313/@-7.9471355,112.6074651,15z/data=!4m10!1m2!2m1!1sresto+padang!3m6!1s0x2e78831e76555b17:0x5727aafab8b970!8m2!3d-7.9390409!4d112.605621!15sCgxyZXN0byBwYWRhbmdaDiIMcmVzdG8gcGFkYW5nkgERcGFkYW5nX3Jlc3RhdXJhbnTgAQA!16s%2Fg%2F11l2n_5jsk?entry=ttu',
                'latitude' => -7.939040660858154,
                'longitude' => 112.58759307861328,
                'images' => 'almahira.jpg',
                'registration_date' => '2024-06-05',
                'type' => 'office',
                'capacity' => 15.6,
                'device_id' => 1,
                'province' => 35,
                'regency' => 3573,
                'district' => 3507,
                'village' => 350723,
                'status' => 'aktif',
            ],
            [
                'id' => 2,
                'user_id' => 4,
                'name' => 'Wahyu',
                'address' => 'Jalan Mertojoyo Malang',
                'telp' => 812345678,
                'email' => 'wahyu@gmail.com',
                'location' => 'Resto Padang',
                'maps' => 'https://www.google.com/maps/place/Al-Maahira+IIBS+Malang/@-7.9071448,112.6245348,17z/data=!3m1!4b1!4m6!3m5!1s0x2dd62bc5d00285d3:0x1557b25d2899e7c4!8m2!3d-7.9071501!4d112.6271097!16s%2Fg%2F11h4v2rcf5?entry=ttu',
                'latitude' => -7.907145023345947,
                'longitude' => 112.6245346069336,
                'images' => 'restopadang.jpg',
                'registration_date' => '2024-06-05',
                'type' => 'resto',
                'capacity' => 20,
                'device_id' => 1,
                'province' => 35,
                'regency' => 3573,
                'district' => 3507,
                'village' => 350723,
                'status' => 'aktif',
            ],
            [
                'id' => 3,
                'user_id' => 5,
                'name' => 'Siska',
                'address' => 'Surabaya',
                'telp' => 812345678,
                'email' => 'siska@gmail.com',
                'location' => 'Bebek Mercon',
                'maps' => 'https://www.google.com/maps/place/Bebek+Goreng+Surabaya+Bang+Jo/@-7.9389978,112.5875956,15z/data=!4m10!1m2!2m1!1sbebek+surabaya!3m6!1s0x2e7883d5c7cca441:0xf5bbfab0f51ca2af!8m2!3d-7.9340957!4d112.6045156!15sCg5iZWJlayBzdXJhYmF5YVoQIg5iZWJlayBzdXJhYmF5YZIBCnJlc3RhdXJhbnTgAQA!16s%2Fg%2F11nxpxxx2j?entry=ttu',
                'latitude' => -7.2750862,
                'longitude' => 112.6302802,
                'images' => 'bebekmercon.jpg',
                'registration_date' => '2024-06-04',
                'type' => 'resto',
                'capacity' => 25,
                'device_id' => 1,
                'province' => 35,
                'regency' => 3573,
                'district' => 3507,
                'village' => 350723,
                'status' => 'aktif',
            ],
        ]);
    }
}
