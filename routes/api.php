<?php

use App\Http\Controllers\HelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/aisdata', [HelperController::class]);
