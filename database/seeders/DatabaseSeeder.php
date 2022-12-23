<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Group;
use App\Models\Image;
use App\Models\Level;
use App\Models\Location;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
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

        Level::factory()->create(['name' => 'Oro']);
        Level::factory()->create(['name' => 'Plata']);
        Level::factory()->create(['name' => 'Bronce']);

        // Para cada Usuario se creará un Perfil, una Localización o País, se le añadiran Grupos, y tendra una Imagen de Perfil
        User::factory(5)->create()->each(
            // Función Anónima que recibe al Usuario creado ahora mismo
            function ($user){
                // Creamos el perfil y make nos crea un array que nos enlaza con el usuario creado ahora mismo, si usamos create en lugar de make se creara el perfil pero no se va a enlazar a este usuario.
                $profile = $user->profile()->save(Profile::factory()->make());

                // Creamos la Localizacion de la misma forma que el Perfil
                $profile->location()->save(Location::factory()->make());

                // Le asignamos Grupos y con la función "varios" le asignamos no solo un grupo sino varios, de lo contrario con poner rand(1,3) bastaría.
                $user->groups()->attach($this->varios(rand(1,3)));

                // Imagen de Perfil personalizada de 90x90 px
                $user->image()->save(Image::factory()->make([
                    'url' => 'https://placeimg.com/90/90/people'
                ]));

                /* No usado pues vamos a poner imagenes personalizadas de internet.
                $user->image()->save(factory(Image::class)->states('imageProfile')->make());*/
            }
        );

        Category::factory(5)->create();
        Tag::factory(15)->create();

        Post::factory(50)->create()->each(
            function ($post){
                $post->image()->save(Image::factory()->make());
                $post->tags()->attach($this->varios(rand(1,15)));

                // Comentarios, entre 1 y 10 por post
                $nComments = rand(1, 10);
                for ($i=0; $i <= $nComments ; $i++) {
                    $post->comments()->save(Comment::factory()->make());
                }
            }
        );

        Video::factory(50)->create()->each(
            function ($video){
                $video->image()->save(Image::factory()->make());
                $video->tags()->attach($this->varios(rand(1,15)));

                // Comentarios, entre 1 y 10 por video
                $nComments = rand(1, 10);
                for ($i=0; $i <= $nComments ; $i++) {
                    $video->comments()->save(Comment::factory()->make());
                }
            }
        );

    }

    // varios es un array y el maximo es el definido en el rand
    public function varios($max){
        $values = [];
        for ($i = 1; $i <= $max; $i++) {
            $values[] = $i;
        }
        return $values;
    }
}
