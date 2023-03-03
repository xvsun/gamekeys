<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = Game::class;

        $fields = ['name'];

        $data = [
            [
                'name' => 'The Forest',
                'image_url' => 'https://steamcdn-a.akamaihd.net/steam/apps/242760/header.jpg',
            ],
            [
                'name' => '1gutesGame',
            ],
            [
                'name' => 'Starbound',
            ],
            [
                'name' => 'Far Cry 5',
            ],
            [
                'name' => 'Cyberpunk 2077',
            ],

        ];

        // hasRelationships is on so the model observer works
        $this->call(GeneralSeeder::class, true, ['class' => $class, 'fields' => $fields, 'data' => $data, 'hasRelationships' => true, 'addTimestamps' => true]);
    }
}
