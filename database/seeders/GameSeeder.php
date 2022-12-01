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
                'platform_id' => Platform::where('name', 'Steam')->firstOrFail()->id,
            ],
            [
                'name' => 'Starbound',
                'platform_id' => Platform::where('name', 'Steam')->firstOrFail()->id,
            ],
            [
                'name' => 'Far Cry 5',
                'platform_id' => Platform::where('name', 'Ubisoft Connect')->firstOrFail()->id,
            ],
            [
                'name' => 'Cyberpunk 2077',
                'platform_id' => Platform::where('name', 'Steam')->firstOrFail()->id,
            ],
        ];

        $this->call(GeneralSeeder::class, true, ['class' => $class, 'fields' => $fields, 'data' => $data, 'hasRelationships' => false, 'addTimestamps' => true]);
    }
}
