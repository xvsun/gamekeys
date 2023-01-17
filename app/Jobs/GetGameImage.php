<?php

namespace App\Jobs;

use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class GetGameImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The game instance.
     *
     * @var \App\Models\Game
     */
    public $game;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $plain = '';
        $api_key = config('services.itad.key');
        // get plain from isthereanydeal api
        $response = Http::get('https://api.isthereanydeal.com/v02/game/plain/?', [
            'key' => $api_key,
            'title' => $this->game->name,
        ]);

        if ($response->successful()) {
            // get plain from response
            $data = $response->json()['data'];

            if (empty($response->json()['data'])) {
                $this->fail($response->json());

            // JSON output is empty
            // $this->game->image_url = asset('storage/images/kein_Bild.png');
            } else {
                // JSON output is not empty
                $plain = $data['plain'];

                // use plain to get image url

                $response = Http::get('https://api.isthereanydeal.com/v01/game/info/?', [
                    'key' => $api_key,
                    'plains' => $plain,
                ]);

                if ($response->successful()) {
                    // get image assign to image_url
                    $data = $response->json()['data'];
                    $this->game->image_url = $data[$plain]['image'];
                } else {
                    $this->fail($response->json());
                    // Platzhalter Bild
                    // $this->game->image_url = asset('storage/images/kein_Bild.png');
                }
            }

            $this->game->save();
        } else {
            $this->fail(print_r($response->json(), true));
        }
    }
}
