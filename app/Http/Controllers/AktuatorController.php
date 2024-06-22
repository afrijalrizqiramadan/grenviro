<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataAktuator;
use Illuminate\Support\Facades\Log;

class AktuatorController extends Controller
{
    public function getBuzzer(Request $request)
    {
        $id = $request->input('device_id');
        $api_key = $request->input('api_key');

        if ($api_key === "2") {
            $buzzer = DB::table('data_aktuators')
            ->where('id', $id)
            ->pluck('heater')
            ->first();
            Log::info('Buzzer: ' . $buzzer);

            if ($buzzer) {
                return response($buzzer, 200)
                    ->header('Content-Type', 'text/plain');
            } else {
                return response('0', 404)
                    ->header('Content-Type', 'text/plain');
            }
        } else {
            return response('0', 403)
                ->header('Content-Type', 'text/plain');
        }
     }
}
