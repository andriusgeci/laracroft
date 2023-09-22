<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('departments')->group(base_path('routes/departments.php'));
Route::name('users')->group(base_path('routes/users.php'));
Route::name('roles')->group(base_path('routes/roles.php'));
Route::name('permissions')->group(base_path('routes/permissions.php'));
