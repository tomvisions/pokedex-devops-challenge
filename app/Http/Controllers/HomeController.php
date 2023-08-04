<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function view()
    {
        $limit = 10;
        
        $data = [];
        for($i = 0; $i < $limit; $i++)
        {
            $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.rand(1,1000))->json();
            array_push($data,$response);
        }
        return view('home', compact('data'));
    }

    public function getPokemons(Request $request)
    {
        $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$request->input('dato'))->json();
        $data = [];
        return json_encode($response);
    }
}
