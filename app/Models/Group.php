<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    // n:n User >> Un Grupo pertenece y tiene muchos Usuarios
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
