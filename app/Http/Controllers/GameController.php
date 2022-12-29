<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use Inertia\Inertia;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::all()->map(function($game) {
            $game->key_amount = $game->keys()->count();
            $game->key_platforms = $game->keys()->get()->map(function ($key) {
                return $key->platform->name;
            })->toArray();
            $this->getPicture($game);

            return $game;
        });
        return Inertia::render('Games/Index', [
            'games' => $games,
            'test' => 1,
            dd($games)
        ]);
    
    }
    public function getPicture(Game $game)
    {
        $plain = '';
        $api_key ='1f649c2d3d6c25203eb7c2569bfe13e28e9e978a';
        // get plain from isthereanydeal api
        $response = Http::get('https://api.isthereanydeal.com/v02/game/plain/?', [
            'key' => $api_key, 
            'title' => $game->name,
        ]);

        
        if ($response->successful()) {
            // todo i.e get the response body save the date etc.#
            $data = $response->json()['data'];
            $plain = $data['plain'];
            
        } else {
            // todo i.e schedule to try again later etc.
            
        }
        
        // use plain to get image url
        $response = Http::get('https://api.isthereanydeal.com/v01/game/info/?', [
            'key' => $api_key,
            'plains' => $plain, 
        ]);
        
        // Determine if the status code is >= 200 and < 300...
        if ($response->successful()) {
            // todo i.e get the response body save the date etc.#
            $data = $response->json()['data'];
            $game->picture_url = $data[$plain]['image'];
            $game->save();
    
        } else {
            // todo i.e schedule to try again later etc.
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGameRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGameRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGameRequest  $request
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }
}
