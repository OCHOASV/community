<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Esta tabla es Polimorfica y el metodo commentable es el que declaramos en la migracion y en las tablas relacionadas, post por ejemplo.
    public function commentable(){
    	// Este funciona para 1:1 y 1:n
        return $this->morphTo();
    }

    // 1:1 User >> Un Comentario pertenece a un Usuario
    public function user(){
        return $this->belongsTo(User::class);
    }
}
