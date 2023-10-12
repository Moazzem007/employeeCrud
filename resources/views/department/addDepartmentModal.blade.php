<!-- Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <form action="" method="post" id="addDepartmentForm">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDepartmentModalLabel">Add Department</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer">

                    </div>

                    <div class="form-group">
                        <label for="name">Department name:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name of the department...">
                    </div>
                    <div class="form-group">
                        <label for="description">Department description:</label>
                        <input type="text" class="form-control" name="description" id="description" placeholder="Description of the department...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_department">Add Department</button>
                </div>
            </div>
        </div>
    </form>
</div>
