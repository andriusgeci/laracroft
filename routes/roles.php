<?php

use Illuminate\Support\Facades\Route;

//All Roles routes goes here.

Route::get('roles/index', function () {
    return view('management.roles.index');
})->name('rolesIndex');
