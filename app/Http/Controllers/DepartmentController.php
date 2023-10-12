<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::latest()->paginate(10);
        return view('department/allDepartments', compact('departments'));
    }

//    Adding a new department here
    public function addDepartment(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:departments',
                'description' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'name.unique' => 'Department already exists',
                'description.required' => 'Description is required',
            ]
        );

        $department = new Department();
        $department->name = $request->name;
        $department->description = $request->description;
        $department->save();

        return response()->json([
            'status' => "success",
        ]);
    }

//updating department
    public function updateDepartment(Request $request)
    {
        $request->validate(
            [
                'update_name' => 'required|unique:departments,name,'.$request->update_id,
                'update_description' => 'required',
            ],
            [
                'update_name.required' => 'Name is required',
                'update_name.unique' => 'Department already exists',
                'update_description.required' => 'Description is required',
            ]
        );

        Department::where('id', $request->update_id)->update([
            'name' => $request->update_name,
            'description' => $request->update_description,
        ]);

        return response()->json([
            'status' => "success",
        ]);
    }

//    deleting a department
    public function deleteDepartment(Request $request)
    {
        Department::find($request->department_id)->delete();

        return response()->json([
            'status' => "success",
        ]);
    }
}
