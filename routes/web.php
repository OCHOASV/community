<?php
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [UserController::class, 'welcome'])->name('home');;

Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile');
Route::get('/level/{id}', [LevelController::class, 'show'])->name('level');