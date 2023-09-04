<?php

//All user routes goes here.

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('users/index', [UserController::class, 'index'])->name('usersIndex');

