
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AktuatorController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
// */
Route::post('/send-data', [SensorDataController::class, 'store']);
Route::get('/get-buzzer', [AktuatorController::class, 'getBuzzer']);
Route::post('/update-device', [DeviceController::class, 'update']);
Route::get('/sensor-data', [SensorDataController::class, 'getFilteredSensorData']);
Route::post('/insert-delivery', [DeliveryController::class, 'store'])->name('insert.route');
Route::post('/update-status/{id}', [DeliveryController::class, 'updateStatus']);
Route::get('/sensor-data/{id_device}', [DashboardController::class, 'getPressureData']);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('api')->group(function () {
//     Route::get('/send-data', [SensorDataController::class, 'store']);
// });

// Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
//     Route::get('places', 'PlaceController@index')->name('places.index');
// });
