<?php

namespace App\Http\Controllers;

use App\Enums\ImageTypeEnum;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Game;
use App\Models\Image;
use Illuminate\Support\Facades\Request;
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
        $games = Game::query()
            ->when(Request::input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->get()
            ->map(function ($game) {
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
            //dd($games)
            'filters' => Request::only(['search']),
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
        $game['keys'] = $game->keys()->with('platform')->get()->setHidden(['key'])->toArray();

        return Inertia::render('Games/Show', [
            'game' => $game,
        ]);
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
