<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\replay_video;

class ReplayVideoController
{
    public function show_trip_video(Request $request)
    {
        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1; // 일요일이 1로 시작되는 요일

        $car_id = $request->input('car_id');
        $departure_time = $request->input('departure_time'); 

        $replay_videos = monitoring_video::where('car_id', '=', $car_id)
                   ->where('departure_time', '=', $departure_time) 
                   ->get();
        
        return response()->json($replay_videos);
    }
}
?>