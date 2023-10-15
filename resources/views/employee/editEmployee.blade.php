@extends('welcome')
@section('content')
    <form action="{{route('update.employee', $employee->id)}}" method="post" >
        @csrf

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Update Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="update_department_id">Select department</label>
                        <select class="form-control" name="department_id">
                            <option disabled selected>Choose department</option>
                            @foreach($departments as $department)

                                <option value="{{$department->id}} " @if($department->id == $employee->department_id) selected @endif>{{$department->name}}</option>


                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" class="form-control" name="first_name" value="{{$employee->first_name}}">
                    </div>
                    <div class="form-group">
                        <label for="update_last_name">Last name:</label>
                        <input type="text" class="form-control" name="last_name" value="{{$employee->last_name}}">
                    </div>
                    <div class="form-group">
                        <label for="update_email">Email:</label>
                        <input type="text" class="form-control" name="email" value="{{$employee->email}}">
                    </div>
                    <div class="form-group">
                        <label for="update_phone_number">Phone:</label>
                        <input type="text" class="form-control" name="phone_number"  value="{{$employee->phone_number}}">
                    </div>
                    <div class="form-group">
                        <label for="hire_date">Hire date:</label>
                        <input type="date" class="form-control" name="hire_date"  value="{{$employee->hire_date}}">
                    </div>
                    <div class="form-group">
                        <label for="job_title">Designation:</label>
                        <input type="text" class="form-control" name="job_title"  value="{{$employee->job_title}}">
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="text" class="form-control" name="salary" value="{{$employee->salary}}">
                    </div>
                </div>

                    <button type="submit" class="btn btn-primary">Update</button>

            </div>
        </div>
    </form>
@endsection
