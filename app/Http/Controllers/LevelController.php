<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function show($id){
    	$level = Level::find($id);
    	// dd($level->name);

        $totalPosts = $level->posts->count();
        $totalVideos = $level->videos->count();
        $totals = array(
            'posts' => $totalPosts,
            'videos' => $totalVideos
        );

    	// Recuperamos los posts y cuantos comentarios tienen
    	$posts = $level->posts()
    		// Quiero que me traiga la categoría, imagen, user y las etiquetas para no hacer la query en la vista
    		->with('category', 'image', 'tags')
            ->withCount(['comments'])->get();
    	$videos = $level->videos()
    		->with('category', 'image', 'tags')
    		->withCount(['comments'])->get();

    	return view('level', compact('level', 'posts', 'videos', 'totals'));
    }
}
