<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function welcome(){
    	$users = User::get();
    	return view('welcome', compact('users'));
    }

    public function show($id){
    	$user = User::find($id);
    	// dd($user->name);

    	// Recuperamos los posts y cuantos comentarios tienen
    	$posts = $user->posts()
    		// Quiero que me traiga la categoría, imagen y las etiquetas para no hacer la query en la vista
    		->with('category', 'image', 'tags')
    		->withCount('comments')->get();
    	$videos = $user->videos()
    		->with('category', 'image', 'tags')
    		->withCount('comments')->get();

    	return view('profile', compact('user', 'posts', 'videos'));
    }
}
