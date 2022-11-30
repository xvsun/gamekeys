<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::environment(['local', 'staging'])) {
            $data = [
                [
                    'name' => 'admin',
                    'email' => 'admin@admin.admin',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('admin123'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'user',
                    'email' => 'user@user.user',
                    'email_verified_at' => Carbon::now(),
                    'password' => Hash::make('user1234'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ];
        } else {
            $data = [];
        }

        foreach ($data as $entry) {
            if (User::where('email', $entry['email'])->count() == 0) {
                $item = User::create($entry);
                $item->save();
            }
        }
    }
}
