<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    // Landing view.
    public function index(): View
    {
        $departmentsList = Department::all();
        return view('management/departments/index', compact('departmentsList'));
    }

    // Create department view.
    public function create(): View
    {
        return view('management.departments.create');
    }

    // Store department to the database.
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
            'director_id' => ['required'],
        ]);

        Department::create([
            'user_id' => 1,
            'director_id' => $request->director_id,
            'name' => $request->name,
        ]);
        Session::flash('success-message', 'Department created successfully!');
        return redirect()->route('departmentsIndex');
    }

    // Edit department view.
    public function edit($id): View
    {
        $department = Department::find($id);
        return view('management.departments.edit', compact('department'));
    }

    // Update department in database.
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
            'director_id' => ['required'],
        ]);

        Department::where('id', $id)->update([
            'director_id' => $request->director_id,
            'name' => $request->name,
        ]);
        Session::flash('success-message', 'Department updated successfully!');
        return redirect()->route('departmentsIndex');
    }

    // Delete department record from database.
    public function delete( $id): RedirectResponse
    {
        $department = Department::find($id);
        $department->delete();
        Session::flash('success-message', 'Department deleted successfully!');
        return redirect()->route('departmentsIndex');
    }

}
