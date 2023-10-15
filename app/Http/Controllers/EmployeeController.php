<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        $departments = Department::all();
        return view('employee/allEmployees', compact('employees', 'departments'));
    }

//    Adding a new department here
    public function addEmployee(Request $request)
    {
        $request->validate(
            [
                'department_id' => 'required',
                'first_name' => 'required|max:50',
                'last_name' => 'required|max:50',
                'email' => 'required|email',
                'phone_number' => 'required',
                'hire_date' => 'required',
                'job_title' => 'required',
                'salary' => 'required',
            ],
            [
                'department_id.required' => 'department id is required',
                'first_name.required' => 'first name id is required',
                'last_name.required' => 'last name id is required',
                'email.required' => 'email id is required',
                'phone_number.required' => 'phone number id is required',
                'hire_date.required' => 'hire date id is required',
                'job_title.required' => 'job title id is required',
                'salary.required' => 'salary is required',
            ]
        );

        $employee = new Employee();
        $employee->department_id = $request->department_id;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone_number = $request->phone_number;
        $employee->hire_date = $request->hire_date;
        $employee->job_title = $request->job_title;
        $employee->salary = $request->salary;
        $employee->save();

        return response()->json([
            'status' => "success",
        ]);
    }

//updating Employee
    public function updateEmployee(Request $request, $id)
    {


        Employee::where('id', '=',  $id)->update([

            'department_id' => $request->department_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'hire_date' => $request->hire_date,
            'job_title' => $request->job_title,
            'salary' => $request->salary,
        ]);


        $employees = Employee::latest()->paginate(10);
        $departments = Department::all();
        return view('employee/allEmployees', compact('employees', 'departments'));
    }


//    edit employee in blade file
    public function editEmployee($id)
    {
        $departments = Department::all();
        $employee = Employee::where('id', '=', $id)->first();
        return view('employee.editEmployee', compact('employee', 'departments'));
    }

//    deleting an employee
    public function deleteEmployee(Request $request)
    {
        Employee::find($request->employee_id)->delete();

        return response()->json([
            'status' => "success",
        ]);
    }
}
