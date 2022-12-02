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
}
