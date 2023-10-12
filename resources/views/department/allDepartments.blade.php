@extends('welcome')
@section('content')
    <div class="table-data mx-2 my-3">
        <h2 class="my-5 text-center">All Departments</h2>
        <a href="" class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addDepartmentModal">Add Department</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Department</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($departments as $key=>$department)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$department->name}}</td>
                <td>{{$department->description}}</td>
                <td>
                    <a href="" class="btn btn-success update_department_form"
                       data-bs-toggle="modal" data-bs-target="#updateDepartmentModal"
                       data-id="{{$department->id}}"
                       data-name="{{$department->name}}"
                       data-description="{{$department->description}}"
                    >
                        <i class="las la-edit"></i>
                    </a>
                    <a href=""
                       class="btn btn-danger delete_department"
                       data-id="{{$department->id}}"
                    >
                        <i class="las la-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    @include('department.addDepartmentModal')
    @include('department.updateDepartmentModal')

@endsection
