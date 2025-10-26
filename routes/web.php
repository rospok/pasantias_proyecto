<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba', App\Livewire\Prueba::class)->name('prueba');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/view', function () {
    return view('view');
})->name('view');