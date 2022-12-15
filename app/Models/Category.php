<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // 1:n Post >> Una Categoría tiene muchos Posts
    public function posts(){
        return $this->hasMany(Post::class);
    }

    // 1:n Video >> Una Categoría tiene muchos Videos
    public function videos(){
        return $this->hasMany(Video::class);
    }
}
