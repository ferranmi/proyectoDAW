<?php

namespace Database\Seeders;

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
        $user = new User();

        $user->dni = '11111111H';
        $user->firstname = 'Administrador';
        $user->lastname = 'Administrador';
        $user->email = 'admin@test.es';
        $user->C_postal = '08635';
        $user->Poblacion = 'Sant Esteve';
        $user->password = password_hash('1111', PASSWORD_BCRYPT);
        $user->birth_date = now();
        $user->type_user = 'A';
        $user->save();


        //DESCOMENTAR CODIGO INFERIOR PARA INTRODUCIR DATOS DE MANERA ALEATORIA A LA BASE DE DATOS
        /* User::factory(10)->create();
        Noticias::factory(10)->create();
        Contacts::factory(10)->create();
        Products::factory(10)->create();
        Races::factory(10)->create(); */

    }
}
