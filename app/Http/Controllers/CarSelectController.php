<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use App\Models\client;
use App\Models\car;
use App\Models\schedule;
use App\Models\driver;


class CarSelectController extends MainController
{
    public function getDayOfWeek()
    {
        $date = date('N'); // 'N'은 요일을 1 (월요일)부터 7 (일요일)까지의 숫자로 나타내는 포맷 문자열입니다.
    
        // 일요일부터 시작하는 순서로 요일 숫자 조정
        $DayOfWeek = ($date + 5) % 7 + 1;

        return $DayOfWeek;
    }

        public function defaultCarTable()
        {
            $carIds = Car::where('BIN', $front_bin)->pluck('car_id')->toArray();
            
            

        }
}
