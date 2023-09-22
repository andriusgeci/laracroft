<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class DepartmentController extends Controller
{
    // Landing view.
    public function index(): View
    {
        return view('management/departments/index');
    }

    // Get All Departments from database latest top to bottom.
    public function getDepartments()
    {
        return response()->json(Department::latest()->get());
    }

    // Update Department in database.
    public function updateDepartment(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'director_id' => ['required'],
        ]);

        Department::where('id', $id)->update([
            'name' => $request->name,
            'director_id' => $request->director_id,
        ]);
    }

    // Save department to the database.

    /**
     * @throws ValidationException
     */
    public function saveDepartment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'director_id' => 'required',
        ]);

        Department::create([
            'user_id' => 1,
            'director_id' => $request->director_id,
            'name' => $request->name,
        ]);
        return response()->json('success');
    }

    // Delete department from database.
    public function deleteDepartment($id)
    {
        Department::where('id', $id)->delete();
        return response()->json('success');
    }
}
