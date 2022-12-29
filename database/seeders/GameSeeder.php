<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call(GeneralSeeder::class, true, ['class' => $class, 'fields' => $fields, 'data' => $data, 'hasRelationships' => false, 'addTimestamps' => true]);
    }
}
