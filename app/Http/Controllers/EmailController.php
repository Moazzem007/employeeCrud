<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function writeEmail($id)
    {
        return view('email.email', compact('id'));
    }

    public function sendMail(Request $request, $id)
    {
        $employee = Employee::where('id', '=', $id)->first();


        $data = ['data' => $request->emailBody];
        $users['to'] = $employee->email;
        $users['subject'] = $request->subject;
        Mail::send('email.mail', $data, function ($messages) use ($users){
            $messages->to($users['to']);
            $messages->subject($users['subject']);
        });


        $employees = Employee::all();
        $departments = Department::all();
        return view('employee/allEmployees', compact('employees', 'departments'));
    }
}
