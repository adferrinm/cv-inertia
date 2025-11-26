<?php

use App\Http\Controllers\CVController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CVController::class, 'index'])->name('cv.index');
