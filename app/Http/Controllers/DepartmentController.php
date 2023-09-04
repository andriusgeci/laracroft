<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departmentsList = Department::all();
        return view('management/departments/index', compact('departmentsList'));
    }

    public function create()
    {
        return view('management.departments.create');
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        Department::create([
            'user_id' => 1,
            'director_id' => $request->director_id,
            'name' => $request->name,
        ]);
        return redirect()->route('departmentsIndex');
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('management.departments.edit', compact($department));
    }
}
