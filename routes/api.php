
<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorDataController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AktuatorController;


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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('api')->group(function () {
//     Route::get('/send-data', [SensorDataController::class, 'store']);
// });

// Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
//     Route::get('places', 'PlaceController@index')->name('places.index');
// });
