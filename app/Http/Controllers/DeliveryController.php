<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Customer;
use App\Models\DeliveryPage;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class DeliveryController extends Controller
{


    public function deliveryPage(Request $request): View {

        $user = Auth::user();

        if($user->hasRole('administrator')) {
            $statuses = DeliveryStatus::with('customer')->get();

            return view('admin/delivery', compact('statuses'));

        }
    }
}
