<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use Illuminate\Support\Facades\DB;

class MqttListener extends Command
{
    protected $signature = 'mqtt:listen'; // Nama perintah artisan
    protected $description = 'Listen for MQTT messages';

    public function handle()
    {
        $mqtt = new MqttClient('103.163.139.98', 1883, 'laravelListener');
        $mqtt->connect();

        $mqtt->subscribe('esp32/data', function (string $topic, string $message) {
            $data = json_decode($message, true);
            DB::table('history_sensors')->insert([
                'pressure' => $data['temperature'],
                'temperature' => $data['humidity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        });

        $mqtt->loop(true);
    }
}
