<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\driver;
use App\Models\trip;

class TripController extends MainController
{

    public function trip_select()
    {
        $start_date = "2022-11-01"; // 이 부분은 프론트에서 ajax로 변수 받아오기
        $end_date = "2022-11-02"; // 이 부분은 프론트에서 ajax로 변수 받아오기

        $start_datetime = $start_date . ' 00:00:00';
        $end_datetime = $end_date . ' 23:59:59';
        
        $trip = trip::where('car_id', 1) // 이 부분은 프론트에서 ajax로 변수 받아오기
            ->whereBetween('departure_time', [$start_datetime, $end_datetime])
            ->select('departure_time', 'arrival_time', 'driver_code', 'dtg_status', 'driving_time', 'driving_distance', 'speed_max', 'speed_avg', 'rpm_max', 'rpm_avg', 'volt_min', 'volt_max', 'overspeed_time', 'accumulated_distance')
            ->get();
            
        return ['trip' => $trip];
    }
}
?>