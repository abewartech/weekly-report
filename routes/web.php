<?php

use Illuminate\Support\Facades\Route;

Route::get('home', function () {
    redirect('login');
})->name('home');