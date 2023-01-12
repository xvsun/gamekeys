<?php

namespace App\Http\Controllers;

use App\Enums\ImageTypeEnum;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Http\Controllers\Log;
use App\Models\Game;
use App\Models\Image;
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

        $games = Game::all()->map(function ($game) {
            if (is_null($game->image_url)) {
                if (Image::where('name', ImageTypeEnum::Placeholder->name)->count() !== 0) {
                    $game['image_url'] = Image::where('name', ImageTypeEnum::Placeholder->name)->first()->getFirstMediaUrl();
                }
            }
            
            $game['key_amount'] = $game->keys()->count();
            $game['key_platforms'] = $game->keys()->get()->map(function ($key) {
                return $key->platform->name;
            })->toArray();

            return $game;
        });

        return Inertia::render('Games/Index', [
            'games' => $games,
            'test' => 1,
            //dd($games)
        ]);
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
