<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\DeliveryStatus;
use App\Models\DataSensor;
use Laravolt\Indonesia\Models\District;

class DashboardController extends Controller
{

    public function dashboardPage(Request $request): View {
        // $user = $request->user();
        $user = Auth::user();
        if($user->hasRole('administrator')) {
            $user = Auth::user(); // Mendapatkan pengguna yang sedang login
            $customerCount = Customer::count(); // Menghitung jumlah data customer
            $averagePressure = DataSensor::avg('pressure');

            $minpressuresensor = DataSensor::join('devices', 'data_sensors.device_id', '=', 'devices.id')
            ->join('customers', 'devices.id', '=', 'customers.device_id')
            ->join('indonesia_districts', 'customers.district', '=', 'indonesia_districts.id') // Join dengan tabel districts
            ->select('data_sensors.*', 'customers.*', 'indonesia_districts.name as district_name')
            ->get();


              return view('dashboard-administrator', compact('customerCount','averagePressure', 'minpressuresensor'));
     }
        elseif($user->hasRole('customer')) {
            $user = Auth::user(); // Mendapatkan pengguna yang sedang login
            $customer = $user->customer; // Mendapatkan data customer yang terkait dengan pengguna
            $device = $customer->device;
            $customer_id = $customer->id;
            $location = $customer->location;
            $capacity = $customer->capacity;
            $nama = $customer->name;
            $images = $customer->images;
            $maps = $device->maps;
            $email = $customer->email;
            $id_device = $device->id;
            $status_device = $device->status;
            $registration_date_device = $customer->registration_date;
            $statuses = DeliveryStatus::where('customer_id', $customer_id)->orderBy('delivery_date', 'desc')
            ->take(5)->get();
           $latestPressure = DataSensor::where('device_id',  $id_device)
            ->orderBy('timestamp', 'desc')
            ->value('pressure');
            $sensorData = DataSensor::where('device_id', $id_device)->orderBy('timestamp')->get();

            // Mengumpulkan data nilai_sensor dan tanggal untuk chart
            $pressure = $sensorData->pluck('pressure');
            $timestamp = $sensorData->pluck('timestamp');

        return view('dashboard-customer', compact('maps','latestPressure','images','location','pressure', 'timestamp','nama', 'statuses','email','status_device','capacity','registration_date_device'));
        }
        elseif($user->hasRole('technician')) {
            return view('dashboard-technician');
         }
    }
}
