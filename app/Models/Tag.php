<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // n:n Post >> Una Etiqueta puede tener o "Pertenece a" muchos Post con la funcion taggable (son los campos que llevan esa palabra clave)
    public function posts(){
    	// Esto es un belongsToMany "polimorfico", esta es la tabla madre y solo funciona para n:n
        return $this->morphedByMany(Post::class, 'taggable');
    }

    // n:n Video >> Una Etiqueta puede tener o "Pertenece a" muchos Videos con la funcion taggable (son los campos que llevan esa palabra clave)
    public function videos(){
    	// Esto es un belongsToMany "polimorfico", esta es la tabla madre
        return $this->morphedByMany(Video::class, 'taggable');
    }
}
