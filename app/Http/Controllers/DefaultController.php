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
        //$client = client::all();
        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1; // 일요일이 1로 시작되는 요일
            
        $car_id = car::pluck('car_id');
        // Fetch all car_status values from the 'car' table
        $car_status = car::pluck('car_status');

        // Fetch all VRN values from the 'car' table
        $VRN = car::pluck('VRN');

        // Fetch driver_code values from the 'schedule' table where trip_date matches $DayOfWeek
        $driver_code = schedule::where('trip_date', $DayOfWeek)
                            ->pluck('driver_code');

        // Fetch driver_name values from the 'driver' table where driver_code matches $driver_code
        $driver_name = driver::whereIn('driver_code', $driver_code)
                            ->pluck('driver_name');

        // You can use $VRN, $car_status, $driver_code, and $driver_name as needed
            
        return view('tbox', $cars = ['car_id' => $car_id,'car_status' => $car_status,'VRN' => $VRN,'driver_name' => $driver_name]);
        }
    //use AuthorizesRequests, ValidatesRequests;
}
?>