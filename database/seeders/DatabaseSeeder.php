<?php

namespace Database\Seeders;

use App\Models\Contacts;
use App\Models\Noticias;
use App\Models\Products;
use App\Models\Races;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Noticias::factory(20)->create();
        Contacts::factory(20)->create();
        Products::factory(20)->create();
        Races::factory(20)->create();
        //$this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
