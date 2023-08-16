<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\schedule;
use App\Models\driver;

class CarSelectController
{
    public function car_select(Request $request)
    {
        $client = $request->input('client');
        $vnum = $request->input('vnum');

        if ($client=='default'){
            $commonQuery = car::query()
            ->Where('VRN', 'like', '%' . $vnum . '%');
        } else{
            $commonQuery = car::where('BIN', $client)
            ->Where('VRN', 'like', '%' . $vnum . '%');
        }

        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1; // 일요일이 1로 시작되는 요일

        $car_id = $commonQuery->pluck('car_id');
        $car_status = $commonQuery->pluck('car_status');
        $VRN = $commonQuery->pluck('VRN');

        $driver_code = schedule::select('driver_code')
            ->whereIn('car_id', $car_id)
            ->where('trip_date', $DayOfWeek)
            ->pluck('driver_code');

        $driver_name = driver::select('driver_name')
            ->whereIn('driver_code', $driver_code)
            ->pluck('driver_name');
        
            return response()->json([
                'car_status' => $car_status,
                'VRN' => $VRN,
                'driver_name' => $driver_name,
            ]);
    }
}
?>