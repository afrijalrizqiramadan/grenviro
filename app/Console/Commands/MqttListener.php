<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\Exceptions\MqttClientException;
use Illuminate\Support\Facades\DB;

class MqttListener extends Command
{
    protected $signature = 'mqtt:subscribe'; // Nama perintah artisan
    protected $description = 'Subscribe to MQTT topic and save data to MySQL';

    public function handle()
    {
        try {

        $mqtt = new MqttClient('103.163.139.98', 1883, 'laravel-mqtt-client');
        $mqtt->connect();

        $mqtt->subscribe('iot/+/+', function (string $topic, string $message) {
            $data = json_decode($message, true); // Decode JSON payload
        
            // Memisahkan topic untuk mendapatkan device_id
            $parts = explode('/', $topic);
            $device_id = $parts[1] ?? null; // Ambil bagian kedua dari topic untuk device_id
        
            // Validasi payload
            if ($device_id && isset($data['pressure'], $data['temperature'])) {
                // Simpan data ke tabel history_sensors
                DB::table('history_sensors')->insert([
                    'device_id' => $device_id,
                    'pressure' => $data['pressure'],
                    'temperature' => $data['temperature'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        
                // Simpan atau perbarui data ke tabel data_sensor
                DB::table('data_sensor')->updateOrInsert(
                    ['device_id' => $device_id],
                    [
                        'pressure' => $data['pressure'],
                        'temperature' => $data['temperature'],
                        'updated_at' => now(),
                    ]
                );
            } else {
                // Log jika payload tidak sesuai
                Log::error('Invalid MQTT payload or topic', [
                    'topic' => $topic,
                    'message' => $message,
                ]);
            }
        });
        $mqtt->loop(true);
    } catch (MqttClientException $e) {
        $this->error('MQTT Exception: ' . $e->getMessage());
    }
    }
}
