<?php

//All permission routes goes here.

use Illuminate\Support\Facades\Route;

Route::get('permissions/index', function () {
    return view('management.permissions.index');
})->name('permissionsIndex');
