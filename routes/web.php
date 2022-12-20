<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [UserController::class, 'welcome']);

Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile');