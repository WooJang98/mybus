<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\monitoring_video;

class MonitoringVideoController extends MainController
{
    public function show_today_video()//ajax 일 때는 괄호안에 Request $request 추가하기
    {
        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1; // 일요일이 1로 시작되는 요일

        //$car_id = $request->input('car_id'); // ajax request로 car_id 받는 변수

        //$videos = video::where('car_id', '=', $car_id) // 
        $videos = monitoring_video::where('car_id', '=', 1) //ajax없이 local test 위한 줄
                   ->where('date', '=', $DayOfWeek) 
                   ->get();
        
        return view('video', ['videos' => $videos]);
        
        //return response()->json($videos);
    }
}
?>