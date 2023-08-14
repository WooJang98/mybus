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
        
        $car_list = [
            'car_id' => $selectedCar['car_id'],
            'VRN' => $selectedCar['VRN'],
            'car_status' => $selectedCar['car_status'],
            'driver_name' => $selectedCar['driver_name'],
        ];
        

        return view('mybus', [
            'clients' => $clients, 
            'car_list' => $car_list,
        ]);
    }
    //use AuthorizesRequests, ValidatesRequests;
}
?>