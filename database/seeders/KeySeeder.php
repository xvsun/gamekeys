<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Key;
use App\Models\Platform;
use App\Models\User;
use Illuminate\Database\Seeder;

class KeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class = Key::class;

        $fields = ['key'];

        $data = [
            [
                'key' => 'ABCDE-FGHIJ-KLMNO-PQRST-UVWXY',
                'game_id' => Game::where('name', 'The Forest')->firstOrFail()->id,
                'platform_id' => Platform::where('name', 'Steam')->firstOrFail()->id,
            ],
            [
                'key' => '12345-45672-67890-FGHIJ-KLMNO',
                'game_id' => Game::where('name', 'Far Cry 5')->firstOrFail()->id,
                'platform_id' => Platform::where('name', 'Ubisoft Connect')->firstOrFail()->id,
            ],
            [
                'key' => '12345-ABCDE-67890-FGHIJ-KLMNO',
                'game_id' => Game::where('name', 'Cyberpunk 2077')->firstOrFail()->id,
                'platform_id' => Platform::where('name', 'GoG')->firstOrFail()->id,
            ],
            [
                'key' => '45678-ABCDE-GFAWE-59312-IOHOE',
                'game_id' => Game::where('name', 'Cyberpunk 2077')->firstOrFail()->id,
                'user_id' => User::where('name', 'user')->firstOrFail()->id,
                'platform_id' => Platform::where('name', 'Steam')->firstOrFail()->id,
            ],
        ];

        $this->call(GeneralSeeder::class, true, ['class' => $class, 'fields' => $fields, 'data' => $data, 'hasRelationships' => false, 'addTimestamps' => true]);
    }
}
