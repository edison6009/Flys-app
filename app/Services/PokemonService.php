<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PokemonService {

    public function getPokemon($name) {

        $pokemon = Http::get('https:/pokeapi.co/api/v2/pokemon/'.$name);
        return $pokemon->json();
    }

    public function getBerries ($name) {
        $berries =  Http::get(env('POKEMONS_API').'berry/'.$name);
        return $berries->json();
    }

}


