<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtg extends Model
{
    protected $table = 'testdtg'; //dtg 테이블이 너무 무거워서 내가 임의로 가벼운 testdtg만들어서 로컬에서 테스트 한거얌!

    public static function getCarPositions()
    {
        return self::select('car_id', 'position_x', 'position_y')
            ->where('position_x', '<>', 0)
            ->where('position_y', '<>', 0)
            ->get();
    }
}
?>