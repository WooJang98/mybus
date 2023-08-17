<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dtg;

class ReplayMapController
{
    public function getPositions(Request $request)
    {
        $car_id = $request->input('car_id');
        $departure_time = $request->input('departure_time');
        //$start_time = '2022-11-01 09:44:30.00'; // local test 용

        //$carPositions = $this->getPositionData($start_time); // local test 용
        $carPositions = $this->getPositionData($departure_time);

        $formattedPositions = [];

        foreach ($carPositions as $position) {
            $formattedPositions[] = [
                'position_x' => $position['position_x'] / 1000000,
                'position_y' => $position['position_y'] / 1000000,
            ];
        }
        
        return response()->json($formattedPositions);
    } 


    public function getPositionData($departure_time)
    {
        return (new MonitoringMapController)->getPositionData($departure_time);
    }
}
?>