<?php

use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Route;

Route::get('activities', [HelperController::class, 'activities']);
