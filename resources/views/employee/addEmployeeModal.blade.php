<!-- Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
    <form action="" method="post" id="addEmployeeForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEmployeeModalLabel">Add Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer">

                    </div>

                    <div class="form-group">
                        <label for="department_id">Select department</label>
                        <select class="form-control" name="department_id" id="department_id">
                            <option disabled selected>Choose department</option>
                            @foreach($departments as $department)

                                <option value="{{$department->id}}">{{$department->name}}</option>

                            @endforeach

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name...">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name:</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name...">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email...">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone:</label>
                        <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number...">
                    </div>
                    <div class="form-group">
                        <label for="hire_date">Hire date:</label>
                        <input type="date" class="form-control" name="hire_date" id="hire_date" placeholder="Hire date...">
                    </div>
                    <div class="form-group">
                        <label for="job_title">Designation:</label>
                        <input type="text" class="form-control" name="job_title" id="job_title" placeholder="Designation...">
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary:</label>
                        <input type="text" class="form-control" name="salary" id="salary" placeholder="Salary...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_employee">Add Department</button>
                </div>
            </div>
        </div>
    </form>
</div>
