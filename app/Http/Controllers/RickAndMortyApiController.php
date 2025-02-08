<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RickAndMortyApiController extends Controller
{

    public function ShowApi()
    {
        $client = new Client();
        $response = $client->get('https://rickandmortyapi.com/api/character');

        $data = json_decode($response->getBody()->getContents(), true);

        return view('RickAndMortyApi', ['characters' => $data['results']]);
    }
}
