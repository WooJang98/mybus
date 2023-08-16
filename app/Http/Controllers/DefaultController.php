<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\client;
use App\Models\car;
use App\Models\schedule;
use App\Models\driver;

class DefaultController extends BaseController

{
    public function default()
        {
        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1; 
        
        $clients = client::all();

        $car_id = car::pluck('car_id');

        $car_status = car::pluck('car_status');

        $VRN = car::pluck('VRN');

        $driver_code = schedule::where('trip_date', $DayOfWeek)
                            ->pluck('driver_code');

        $driver_name = driver::whereIn('driver_code', $driver_code)->pluck('driver_name');
            
        return view('mybus', ['clients' => $clients, 'cars' => ['car_id' => $car_id,'car_status' => $car_status,'VRN' => $VRN,'driver_name' => $driver_name]]);
        }
    //use AuthorizesRequests, ValidatesRequests;
}
?>