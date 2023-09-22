<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;


//All Roles routes goes here.

// Laravel routing
Route::get('/index', [RoleController::class, 'index'])->name('rolesIndex');
