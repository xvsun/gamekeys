<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleHasPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ModelHasRolesSeeder::class);

        $this->call(PlatformSeeder::class);
        $this->call(GameSeeder::class);
        $this->call(KeySeeder::class);
    }
}
