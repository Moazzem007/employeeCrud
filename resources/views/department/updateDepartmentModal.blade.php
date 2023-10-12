<!-- Modal -->
<div class="modal fade" id="updateDepartmentModal" tabindex="-1" aria-labelledby="updateDepartmentModalLabel" aria-hidden="true">
    <form action="" method="post" id="updateDepartmentForm">
        @csrf
        <input type="hidden" id="update_id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDepartmentModalLabel">Update Department</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="errMsgContainer">

                    </div>

                    <div class="form-group">
                        <label for="name">Department name:</label>
                        <input type="text" class="form-control" name="update_name" id="update_name" placeholder="Name of the department...">
                    </div>
                    <div class="form-group">
                        <label for="description">Department description:</label>
                        <input type="text" class="form-control" name="update_description" id="update_description" placeholder="Description of the department...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_department">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
