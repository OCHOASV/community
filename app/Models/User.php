<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 1:1 Profile >> Un usuario tiene un Perfil
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    // 1:n Level >> Un Usuario pertenece a un Nivel
    public function level(){
        return $this->belongsTo(User::class);
    }

    // n:n Group >> Un Usuario pertenece y tiene muchos Grupos
    public function groups(){
        return $this->belongsToMany(Group::class)->withTimestamps();
    }

    // 1:1 Location >> Un Usuario tiene una Localizacion o Pais a través de o por medio de un Perfil
    public function location(){
        return $this->hasOneThrough(Location::class, Profile::class);
    }

    // 1:n Post >> Un Usuario tiene muchos Posts
    public function posts(){
        return $this->hasMany(Post::class);
    }

    // 1:n Video >> Un Usuario tiene muchos Videos
    public function videos(){
        return $this->hasMany(Video::class);
    }

    // 1:n Comment >> Un Usuario tiene muchos Comentarios
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // 1:1 Image >> Un Usuario tiene una Imagen con la funcion imageable (son los campos que llevan esa palabra clave)
    public function image(){
        // Esto es un hasOne "polimorfico"
        return $this->morphOne(Image::class, 'imageable');
    }
}
