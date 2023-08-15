<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dtg;

class MapController extends MainController
{
    public function getPositions()
    {
        $start_time = '2022-11-01 09:44:30.00';

        $carPositions = $this->getPositionData($start_time);

        $formattedPositions = [];

        foreach ($carPositions as $position) {
            $formattedPositions[] = [
                'position_x' => $position['position_x'] / 1000000,
                'position_y' => $position['position_y'] / 1000000,
            ];
        }
        return $formattedPositions;
    } 

    public function getPositionData($start_time)
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
                if ($dtg->departure_time == $start_time) {
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