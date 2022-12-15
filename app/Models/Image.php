<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    // Esta tabla es Polimorfica y el metodo imageable es el que declaramos en la migracion y en las tablas relacionadas, post por ejemplo.
    public function imageable(){
    	// Este funciona para 1:1 y 1:n
        return $this->morphTo();
    }
}
