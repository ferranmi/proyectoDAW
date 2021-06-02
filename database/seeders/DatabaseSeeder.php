<?php

namespace Database\Seeders;

use App\Models\Contacts;
use App\Models\Noticias;
use App\Models\Products;
use App\Models\Races;
use App\Models\User;
use Carbon\Carbon;
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
        $user = new User();

        $user->dni = '11111111H';
        $user->firstname = 'Administrador';
        $user->lastname = 'Administrador';
        $user->email = 'admin@test.es';
        $user->C_postal = '08635';
        $user->Poblacion = 'Sant Esteve';
        $user->password = password_hash('1111', PASSWORD_BCRYPT);
        $user->birth_date = "2000-03-01 17:15:16";
        $user->type_user = 'A';
        $user->save();

        /*User::factory(20)->create();
        Noticias::factory(20)->create();
        Contacts::factory(20)->create();
        Products::factory(20)->create();
        Races::factory(20)->create();*/
        //$this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
