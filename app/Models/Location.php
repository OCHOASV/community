<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    /* Esto lo necesitariamos si por medio de la localizacion accedieramos al perfil o al usuario, pero como no es el caso, no necesitamos hacerlo. Esta es la relacion inversa y no es necesaria hacerla en todos los casos.
    // 1:1 Profile >> Un Nivel pertenece a un Perfil
    public function profile(){
        return $this->belongsTo(Profile::class);
    }*/
}
