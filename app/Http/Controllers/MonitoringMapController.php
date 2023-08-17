<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\monitoring_map;
use App\Models\dtg;

class MonitoringMapController extends Controller
{
    public function getPositions(Request $request)
    {
        $car_id = $request->input('car_id');
        $d = date('N'); 
        $DayOfWeek = $d % 7 + 1;

        $departure_time = monitoring_map::where('car_id', $car_id)
            ->where('trip_date', $DayOfWeek)
            ->pluck('departure_time');

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
        $items_per_Page = 1000;
        $page = 0;
        $carPositions = [];
        $startDataFound = false;

        do {
            $dtg_list = dtg::skip($page * $items_per_Page)
                ->take($items_per_Page)
                ->get();
    
            foreach ($dtg_list as $dtg) {
                if ($dtg->departure_time == $departure_time) {
                    $startDataFound = true; 
                    if ($dtg->position_x != 0) {
                        $carPositions[] = [
                            'position_x' => $dtg->position_x,
                            'position_y' => $dtg->position_y,
                        ];
                    }
                } elseif ($startDataFound) {
                    break 2;
                }
            } 
            $page++;
        } while (count($dtg_list) > 0);
    
        return $carPositions;
    }
}
?>