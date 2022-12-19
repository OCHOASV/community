<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Group::factory(3)->create();

        Level::factory(3)->create(['name' => 'Oro']);
        Level::factory(3)->create(['name' => 'Plata']);
        Level::factory(3)->create(['name' => 'Bronce']);

        // Para cada Usuario se creará un Perfil, una Localización o País, se le añadiran Grupos, y tendra una Imagen de Perfil
        User::factory(5)->create()->each(
            // Función Anónima que recibe al Usuario creado ahora mismo
            function ($user){
                // Creamos el perfil y make nos crea un array que nos enlaza con el usuario creado ahora mismo, si usamos create en lugar de make se creara el perfil pero no se va a enlazar a este usuario.
                $profile = $user->profile()->save(factory(Profile::class)->make());

                // Creamos la Localizacion de la misma forma que el Perfil
                $profile = location()->save(factory(Location::class)->make());

                // Le asignamos Grupos y con la función "varios" le asignamos no solo un grupo sino varios, de lo contrario con poner rand(1,3) bastaría.
                $user->groups()->attach($this->varios(rand(1,3)));

                // Imagen de Perfil personalizada de 90x90 px
                $user->image()->save(factory(Location::class)->make([
                    'url' => 'https://placeimg.com/90/90/any'
                ]));

                /* No usado pues vamos a poner imagenes personalizadas de internet.
                $user->image()->save(factory(Image::class)->states('imageProfile')->make());*/
            }
        );
    }

    // varios es un array y el maximo es 3, definido en el rand
    public function varios($max){
        $values = [];
        for ($i=0; $i <= $max; $i++) {
            $values[] = $i;
        }
        return $values;
    }
}
