<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PressureController;
use App\Http\Controllers\TemperatureController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\OutletMapController;
use App\Http\Controllers\CentrePointController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SpaceController;
use App\Http\Livewire\MembersTable;
use App\Http\Controllers\LocationController;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::group(['middleware' => ['auth', 'lockscreen']], function () {
    // Rute yang memerlukan autentikasi dan bisa terkunci
});
Route::get('/route-cache', function () {
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('view:clear');
    echo "optimized = ";
    return print_r($exitCode);
});
Route::middleware([
    'auth','verified'
])->group(callback: function () {
    Route::get('/dashboard', [DashboardController::class,'dashboardPage'])->name('dashboard');
    Route::get('/pressure', [PressureController::class,'pressurePage'])->name('pressure');
    Route::get('/temperature', [TemperatureController::class,'temperaturePage'])->name('temperature');
    Route::get('/delivery', [DeliveryController::class,'deliveryPage'])->name('delivery');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/map',[App\Http\Controllers\MapController::class,'index'])->name('map.index');
    Route::get('/detailcustomer/{slug}',[App\Http\Controllers\DetailCustomerController::class,'detailPage'])->name('detail-customer');

    Route::resource('customer',(CustomerController::class));
    Route::resource('centre-point',(CentrePointController::class));
    Route::resource('category',(CategoryController::class));
    Route::resource('space',(SpaceController::class));

    Route::get('/centrepoint/data',[DataController::class,'centrepoint'])->name('centre-point.data');
    Route::get('/categories/data',[DataController::class,'categories'])->name('data-category');
    Route::get('/spaces/data',[DataController::class,'spaces'])->name('data-space');
});
Route::get('provinces',[LocationController::class,'provinces'])->name('provinces');
Route::get('cities',[LocationController::class,'cities'])->name('cities');
Route::get('districts',[LocationController::class,'districts'])->name('districts');
Route::get('villages',[LocationController::class,'villages'])->name('villages');
Route::get('/lock-screen', [LockScreenController::class, 'showLockScreen'])->name('lock.screen');
Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');
Route::controller(RoleController::class)->group(function(){
    Route::get('/roles','index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
