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
    	dd($user->name);
    	// return view('welcome', compact('users'));
    }
}
