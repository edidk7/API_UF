<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UFController extends Controller
{
    public function obtenerDatosAPI()
    {
        $client = new Client();
        $response = $client->get('https://mindicador.cl/api/uf');
        $data = json_decode($response->getBody(), true);
        return $data;
    }
}