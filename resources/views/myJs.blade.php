<script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<script>
    $(document).ready(function (){
        $(document).on('click', '.add_department', function (e){
            e.preventDefault();
            let name = $('#name').val();
            let description = $('#description').val();

            $.ajax({
                url:'{{route('add.department')}}',
                method:'post',
                data: {name:name, description:description},
                success:function (res){
                    if(res.status == "success"){
                        $('#addDepartmentModal').modal('hide');
                        $('#addDepartmentForm')[0].reset();
                        $('.table').load(location.href+' .table');
                    }
                },error:function (err){
                    let error = err.responseJSON;
                    $.each(error.errors,function (index, value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            });

        });
    //     show department values in the update form
        $(document).on('click', '.update_department_form', function (){
            let id = $(this).data('id');
            let name = $(this).data('name');
            let description = $(this).data('description');

            $('#update_id').val(id);
            $('#update_name').val(name);
            $('#update_description').val(description);

        });

    //     update department data
        $(document).on('click', '.update_department', function (e){
            e.preventDefault();
            let update_id = $('#update_id').val();
            let update_name = $('#update_name').val();
            let update_description = $('#update_description').val();

            $.ajax({
                url:'{{route('update.department')}}',
                method:'post',
                data: {update_id:update_id, update_name:update_name, update_description:update_description},
                success:function (res){
                    if(res.status == "success"){
                        $('#updateDepartmentModal').modal('hide');
                        $('#updateDepartmentForm')[0].reset();
                        $('.table').load(location.href+' .table');
                    }
                },error:function (err){
                    let error = err.responseJSON;
                    $.each(error.errors,function (index, value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            });

        });


        //     delete department data
        $(document).on('click', '.delete_department', function (e){
            e.preventDefault();
            let department_id = $(this).data('id');
            if(confirm('Are you sure you want to delete this department?'))
            {
                $.ajax({
                    url:'{{route('delete.department')}}',
                    method:'post',
                    data: {department_id:department_id},
                    success:function (res){
                        if(res.status == "success"){
                            $('.table').load(location.href+' .table');
                        }
                    }
                });
            }



        });
    });
</script>


{{--Ajax and javascript for Employees--}}
<script>
    $(document).ready(function (){
        $(document).on('click', '.add_employee', function (e){
            e.preventDefault();
            let department_id = $('#department_id').val();
            let first_name = $('#first_name').val();
            let last_name = $('#last_name').val();
            let email = $('#email').val();
            let phone_number = $('#phone_number').val();
            let hire_date = $('#hire_date').val();
            let job_title = $('#job_title').val();
            let salary = $('#salary').val();

            $.ajax({
                url:'{{route('add.employee')}}',
                method:'post',
                data: {department_id:department_id, first_name:first_name, last_name:last_name, email:email, phone_number:phone_number, hire_date:hire_date, job_title:job_title, salary:salary},
                success:function (res){
                    if(res.status == "success"){
                        $('#addEmployeeModal').modal('hide');
                        $('#addEmployeeForm')[0].reset();
                        $('.employee_table').load(location.href+' .employee_table');
                    }
                },error:function (err){
                    let error = err.responseJSON;
                    $.each(error.errors,function (index, value){
                        $('.errMsgContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                    });
                }
            });

        });



        //     delete Employee data
        $(document).on('click', '.delete_employee', function (e){
            e.preventDefault();
            let employee_id = $(this).data('id');
            if(confirm('Are you sure you want to delete this Employee?')) {
                $.ajax({
                    url: '{{route('delete.employee')}}',
                    method: 'post',
                    data: {employee_id: employee_id},
                    success: function (res) {
                        if (res.status == "success") {
                            $('.table').load(location.href + ' .table');
                        }
                    }
                });
            }



        });
    });
</script>
