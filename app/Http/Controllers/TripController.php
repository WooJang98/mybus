<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trip;
use Illuminate\Support\Facades\DB;

class TripController
{

    public function trip_select(Request $request)
    {
        $car_id = $request->input('car_id');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $start_datetime = $start_date . ' 00:00:00';
        $end_datetime = $end_date . ' 23:59:59';
        
        $trip = trip::where('car_id', $car_id)
        ->whereBetween('departure_time', [$start_datetime, $end_datetime])
        ->join('driver', 'trip.driver_code', '=', 'driver.driver_code') 
        ->select('departure_time', 'arrival_time', 'driver.driver_name', 'dtg_status', DB::raw('CAST(driving_time AS CHAR) AS driving_time'), 'driving_distance', 'speed_max', 'speed_avg', 'rpm_max', 'rpm_avg', 'volt_min', 'volt_max', 'overspeed_time', 'accumulated_distance')
        ->get();

        $tripArray = json_decode(json_encode($trip), true);

        return response()->json($tripArray);
    }
}
?>