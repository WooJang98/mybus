<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class MainController extends BaseController

{
    public function MainController(){
        $client_result = (new ClientController) -> get_client_name();
        $car_select = (new CarSelectController) -> getDayOfWeek();

        return view('mybus', ['clients'=> $client_result, 'car_select'=>$car_select]);
    }
    //use AuthorizesRequests, ValidatesRequests;

    
}
?>