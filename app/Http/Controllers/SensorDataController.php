<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

use Illuminate\Support\Facades\Validator;
use App\Models\HistorySensor;
use App\Models\DataSensor;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    public function showChart()
    {
        $id_device = Auth::user()->customer->device->id;
        return view('chart', compact('id_device'));
    }

    public function getFilteredSensorData(Request $request)
    {
        $id_device = $request->input('id_device');
        $period = $request->input('period', 'all');
        $sensorData = $this->getSensorDataByPeriod($id_device, $period);
        return response()->json($sensorData);
    }

    private function getSensorDataByPeriod($id_device, $period)
    {
        switch ($period) {
            case 'day':
                $start = \Carbon\Carbon::today();
                break;
            case '7days':
                $start = \Carbon\Carbon::now()->subDays(7);
                break;
            case '30days':
                $start = \Carbon\Carbon::now()->subDays(30);
                break;
            case 'month':
                $start = \Carbon\Carbon::now()->startOfMonth();
                break;
            case 'year':
                $start = \Carbon\Carbon::now()->startOfYear();
                break;
            default:
                $start = null;
                break;
        }

        if ($start) {
            return HistorySensor::where('device_id', $id_device)
                ->where('timestamp', '>=', $start)
                ->orderBy('timestamp')
                ->get();
        } else {
            return HistorySensor::where('device_id', $id_device)
                ->orderBy('timestamp')
                ->get();
        }
    }
}
