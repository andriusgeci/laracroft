<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;


// All Departments routes goes here.

Route::get('departments/index', [DepartmentController::class, 'index'])->name('departmentsIndex');
Route::get('departments/create', [DepartmentController::class, 'create'])->name('departmentsCreate');
Route::post('departments/store', [DepartmentController::class, 'store'])->name('departmentsStore');
Route::get('departments/edit/{id}', [DepartmentController::class, 'edit'])->name('departmentsEdit');
Route::get('departments/delete/{id}', [DepartmentController::class, 'delete'])->name('departmentsDelete');
Route::post('departments/update/{id}', [DepartmentController::class, 'update'])->name('departmentsUpdate');
