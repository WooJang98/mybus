<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\schedule;
use App\Models\driver;

class CarSelectController extends MainController
{

    public function car_select()
    {
        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1;

        $request = 3548162574;

        $car_id = car::select('car_id')->where('BIN',3548162574)->pluck('car_id');
        $car_status = car::select('car_status')->where('BIN',3548162574)->pluck('car_status');
        $VRN = car::select('VRN')->where('BIN',3548162574)->pluck('VRN');

        $driver_code = schedule::select('driver_code')
        ->whereIn('car_id',$car_id)
        ->where('trip_date', $DayOfWeek)->pluck('driver_code');

        $driver_name = driver::select('driver_name')->
        whereIn('driver_code',$driver_code)->pluck('driver_name');
        
        return ['car_id' => $car_id, 'VRN' => $VRN, 'car_status' => $car_status, 'driver_code' => $driver_code,  'driver_name' => $driver_name];
    }
}
?>