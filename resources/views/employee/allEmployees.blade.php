@extends('welcome')
@section('content')
    <div class="table-data mx-2 my-3">
        <h2 class="my-5 text-center">All Employees</h2>
        <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add Employee</a>
        <table class="table employee_table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Department</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Hire date</th>
                <th scope="col">Designation</th>
                <th scope="col">Salary</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $key=>$employee)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td> @foreach($departments as $department) @if($department->id == $employee->department_id) {{$department->name}} @endif @endforeach</td>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone_number}}</td>
                    <td>{{$employee->hire_date}}</td>
                    <td>{{$employee->job_title}}</td>
                    <td>{{$employee->salary}}</td>

                    <td>
                        <a href="{{route("edit.employee", $employee->id)}}" class="btn btn-success"><i class="las la-edit"></i></a>
                        <a href=""
                           class="btn btn-danger delete_employee"
                           data-id="{{$employee->id}}"
                        >
                            <i class="las la-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    @include('employee.addEmployeeModal')

@endsection
