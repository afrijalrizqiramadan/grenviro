<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActuatorController extends Controller
{
    public function getBuzzer(Request $request)
    {
        $id = $request->input('device');
        $api_key = $request->input('api_key');

        if ($api_key === env('API_KEY')) {
            $result = DB::table('data_aktuator')
                ->select('buzzer')
                ->where('device_id', $id)
                ->first();

            if ($result) {
                return response()->json($result);
            } else {
                return response()->json(['message' => '0 results'], 404);
            }
        } else {
            return response()->json(['message' => 'Invalid API key'], 403);
        }
    }
}
