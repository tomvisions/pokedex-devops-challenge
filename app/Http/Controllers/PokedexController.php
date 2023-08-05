<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Mockery\Undefined;
use Illuminate\Support\Facades\Log;

class PokedexController extends Controller
{
    //

    public function view($nameOrId)
    {
        $data = Http::get('https://pokeapi.co/api/v2/pokemon/'.Str::lower($nameOrId))->json();
        
        if($data == null) abort(404);

        $colorBack = $this->getColorBackPokemon($data['types'][0]['type']['name']);

        $colorTypesAndTypes = [];

        foreach($data['types'] as $type)
        {
            $colorTypesAndTypes[$type['type']['name']] = $this->getColorBackPokemon($type['type']['name']);
        }

        $abilities = [];

        foreach($data['abilities'] as $item)
        {
            $response = Http::get($item['ability']['url'])->json();
            $abilities[$response['name']] = $this->getDescAbility($response);
        }

        return view('pokedex', compact('data','colorBack','colorTypesAndTypes', 'abilities'));
    }

    public function getColorBackPokemon($name)
    {
        $types =array(
            'bug'=> '#4ade80',
            'dark'=> '#6366f1',
            'dragon'=> '#06b6d4',
            'electric'=> '#fde047',
            'fairy'=>'#e11d48',
            'fighting'=> '#1a2e05',
            'fire'=> '#b91c1c',
            'flying'=>'#0e7490',
            'ghost'=> '#4338ca',
            'grass'=>'#84cc16',
            'ground'=> '#854d0e',
            'ice'=>'#a5f3fc',
            'normal'=> '#3f3f46',
            'poison'=> '#a21caf',
            'psychic'=> '#ec4899',
            'rock'=>'#422006',
            'steal'=> '#10b981',
            'water'=>'#2563eb'
        );
        
        return isset($types[$name]) ? $types[$name] : '#6b7280';
    }

    public function getDescAbility($response)
    {
        
        foreach($response['effect_entries'] as $effect)
        {
            if(strcasecmp($effect['language']['name'],'en') === 0) return isset($effect['short_effect']) ? $effect['short_effect'] : $effect['effect'];
        }
    }

    public function getEvoChain($nameOrId)
    {
        $species = Http::get('https://pokeapi.co/api/v2/pokemon/'.Str::lower($nameOrId))->json();
        $data = Http::get('https://pokeapi.co/api/v2/pokemon-species/'.$species['species']['name'])->json();

        $evoChain = Http::get($data['evolution_chain']['url'])->json();
        $evolutions = [];
        $this->getEvos($evoChain['chain'], $evolutions);


        return json_encode($evolutions);
    }

    public function getEvos($chain,&$evolutions)
    {
        if(count($evolutions) === 0 && isset($chain['species']['name']))
        {
            $firstEvo = [];
            $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$chain['species']['name'])->json();
            array_push($firstEvo, $response);
            array_push($evolutions, $firstEvo);
        }

        if (isset($chain['evolves_to']) && count($chain['evolves_to']) > 0) {
            $evo = [];
            
            foreach ($chain['evolves_to'] as $evolvesTo) {
                $response = Http::get('https://pokeapi.co/api/v2/pokemon/'.$evolvesTo['species']['name'])->json();
                array_push($evo, $response);
            }
            

            array_push($evolutions, $evo);
            $this->getEvos($evolvesTo, $evolutions);
        }
    }
}
