<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    // 1:n User >> Un Nivel tiene muchos Usuarios
    public function users(){
        return $this->hasMany(User::class);
    }

    // 1:n Post >> Un Nivel tiene muchos Posts a través de o por medio de un Usuario
    public function posts(){
        return $this->hasManyThrough(Post::class, User::class);
    }

    // 1:n Video >> Un Nivel tiene muchos Videos a través de o por medio de un Usuario
    public function videos(){
        return $this->hasManyThrough(Video::class, User::class);
    }
}
