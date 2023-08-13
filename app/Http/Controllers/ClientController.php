<?php

namespace App\Http\Controllers;
use App\Models\client;

class ClientController extends MainController
{
    public function get_client()
    {
        $client = client::all();

        return $client;   
    }
}