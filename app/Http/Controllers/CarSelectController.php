<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\schedule;
use App\Models\driver;

class CarSelectController extends MainController
{
    public function car_select(Request $request) // $request는 ajax로 사용자의 입력값을 받아옴.
    {
        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1; // 일요일이 1로 시작되는 요일

        $query = car::where('VRN', 'like', '%' . $search . '%');
        
        if (is_numeric($request->input('request'))) {
            $query->where('BIN', $request->input('request'));
        } elseif ($request->input('request') === "default") {
            // No additional filtering needed for 'BIN' column when 'default' is selected
        }
        
        $result = $query->select('car_id', 'car_status', 'VRN')->get();

        $car_id = $result->pluck('car_id');
        $car_status = $result->pluck('car_status');
        $VRN = $result->pluck('VRN');

        $driver_code = schedule::select('driver_code')
            ->whereIn('car_id', $car_id)
            ->where('trip_date', $DayOfWeek)
            ->pluck('driver_code');

        $driver_name = driver::select('driver_name')
            ->whereIn('driver_code', $driver_code)
            ->pluck('driver_name');
        
        return ['car_id' => $car_id, 'VRN' => $VRN, 'car_status' => $car_status, 'driver_name' => $driver_name];
    }
}?>