<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // 1:1 Location >> Un perfil tiene una localizacion
    // Este es el enlace para que desde perfil podamos ver la localizacion de un usuario sin consultar el perfil (hasOneThrough)
    public function location(){
        return $this->hasOne(Location::class);
    }

    /* Esto lo necesitariamos si por medio del Perfil accedieramos al Usuario, pero como no es el caso, no necesitamos hacerlo. Esta es la relacion inversa y no es necesaria hacerla en todos los casos.
    // 1:1 User >> Un Perfil pertenece a un Usuario
    public function user(){
        return $this->belongsTo(User::class);
    }*/
}
