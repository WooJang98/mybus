<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dtg;

class ReplayMapController
{
    public function getPositions(Request $request)
    {
        $departure_time = $request->input('departure_time');

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