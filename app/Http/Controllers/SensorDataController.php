<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\HistorySensor;
use App\Models\DataSensor;

class SensorDataController extends Controller
{
    public function store(Request $request)
    {
  // Validasi `api_key`
            $apiKey = $request->input('api_key');
            if ($apiKey !== env('API_KEY')) {
                return response()->json(['error' => 'Invalid API key'], 403);
            }
          $validator = Validator::make($request->all(), [
            'api_key' => 'required|string',
            'device_id' => 'required|numeric',
            'timestamp' => 'required|date',
            'pressure' => 'required|numeric',
            'temperature' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Ambil data yang telah divalidasi kecuali `api_key`
        $data = $validator->validated();

        // Simpan data ke tabel history_sensor
        HistorySensor::create($data);

        // Update data di tabel data_sensor berdasarkan device_id
        DataSensor::where('device_id', $data['device_id'])
            ->update([
                'timestamp' => $data['timestamp'],
                'pressure' => $data['pressure'],
                'temperature' => $data['temperature'],
            ]);

        return response()->json(['message' => 'Data received and processed successfully', 'data' => $data], 200);
    }
}
