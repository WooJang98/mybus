<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController

{
    public function MainController(){

        $clientController = new ClientController();
        $clients = $clientController->get_client();

        $carSelectController = new CarSelectController();
        $selectedCar = $carSelectController->car_select();

        $tripController = new TripController();
        $trip_list = $tripController->trip_select();

        return view('mybus', [
            'clients' => $clients, 
            'cars' => $selectedCar,
            'trips' => $trip_list,
        ]);
    }
    //use AuthorizesRequests, ValidatesRequests;
}
?>