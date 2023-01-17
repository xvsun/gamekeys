<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Steam',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Origin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'GoG',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ubisoft Connect',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($data as $entry) {
            if (Platform::where('name', $entry['name'])->count() == 0) {
                $item = Platform::create($entry);
                $item->save();
            }
        }
    }
}
