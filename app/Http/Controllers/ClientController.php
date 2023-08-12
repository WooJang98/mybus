<?php

namespace App\Http\Controllers;

use App\Http\Controllers\MainController;
use App\Models\client;

class ClientController extends MainController
{
    public function get_client_name()
    {
        // 데이터 조회
        $client = client::all();
        //$client = client::select('client_name') ->get();

        // 조회 결과를 뷰로 전달
        return $client;
        
    }
}