<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\schedule;
use App\Models\driver;

function get_date(){
    $d = date('N'); // 'N'은 요일을 1 (월요일)부터 7 (일요일)까지의 숫자로 나타내는 포맷 문자열입니다.
    
    // 일요일부터 시작하는 순서로 요일 숫자 조정
    $DayOfWeek = ($d + 5) % 7 + 1;

    return $DayOfWeek;  
    }

// function get_driver_code(){
//     $driver_code = schedule::select('driver_code')
//         ->where('trip_date', '=', get_date())
//         ->pluck('driver_code');

//     return $driver_code;
// }



class CarSelectController extends Controller
{
    

    public function car_select()
    {
        $car_id = car::where('BIN', 3548162574)->pluck('car_id');
        $VRN = car::where('BIN', 3548162574)->pluck('VRN'); //3548162574 이 부분에 유저가 선택한 client_name의 BIN이 들어와야 함. 
        $car_status = car::where('BIN', 3548162574)->pluck('car_status');
        foreach($car_id as $ci);
        $driver_code = schedule::where('car_id', $car_id)->where('trip_date', '=', get_date())->pluck('driver_code');
        // $driver_code = schedule::select('driver_code')
        // ->where('trip_date', '=', get_date())
        // ->where('trip_date', '=', get_date())
        //진짜 주석->where('trip_date', '=',  $DayOfWeek)->get();
        //->pluck('driver_code');
        $driver_name = driver::where('BIN', 3548162574)->where('driver_code','=',$driver_code)->pluck('driver_name');
        // $driver_name = driver::select('driver_name')
        // ->where('driver_code','=',$driver_code)
        // ->pluck('driver_name');
        
        return view('test', ['car_id' => $car_id, 'VRN' => $VRN, 'car_status' => $car_status, 'driver_code' => $driver_code,  'driver_name' => $driver_name]);
    }
}
?>