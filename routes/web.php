<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('guest')->with("type", "login");
})->name('login');
Route::get('/register', function () {
    return view('guest')->with("type", "register");
})->name('register');

Route::get('/dashboard', function () {
    return view('home')->with("type", "dashboard");
})->name('dashboard')->middleware('auth');

// Route::livewire("/", "home");