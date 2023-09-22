<?php

//All user routes goes here.

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/index', [UserController::class, 'index'])->name('usersIndex');

