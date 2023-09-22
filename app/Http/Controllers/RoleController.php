<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Contracts\View\View;

class RoleController extends Controller
{
    public function index() : View
    {
        return view('management.roles.index');
    }
}
