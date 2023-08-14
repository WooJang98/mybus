<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dtg;


class MapController extends MainController
{
    public function getNonZeroPositions()
    {
        $carPositions = dtg::getCarPositions();

        $formattedPositions = [];

        foreach ($carPositions as $position) {
            $formattedPosition = $this->formatCoordinates($position->position_x, $position->position_y);
            $formattedPositions[] = $formattedPosition;
        }

        return ['map' => $formattedPositions];
    }

    public function formatCoordinates($position_x, $position_y)
    {
        $formattedPosition = [
            'position_x' => $position_x / 1000000,
            'position_y' => $position_y / 1000000,
        ];

        return $formattedPosition;
    }
}
?>