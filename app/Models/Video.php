<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    // 1:1 User >> Un Video pertenece a un Usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    // 1:1 Category >> Un Video pertenece a un Categoría
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // 1:n Comment >> Un Video puede tener muchos Comentarios con la funcion commentable (son los campos que llevan esa palabra clave)
    public function comments(){
    	// Esto es un hasMany "polimorfico"
        return $this->morphMany(Comment::class, 'commentable');
    }

    // 1:1 Image >> Un Video tiene una Imagen con la funcion imageable (son los campos que llevan esa palabra clave)
    public function image(){
    	// Esto es un hasOne "polimorfico"
        return $this->morphOne(Image::class, 'imageable');
    }

    // n:n Tag >> Un Video puede tener o "Pertenece a" muchas Etiquetas con la funcion taggable (son los campos que llevan esa palabra clave)
    public function tags(){
    	// Esto es un belongsToMany "polimorfico"
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
