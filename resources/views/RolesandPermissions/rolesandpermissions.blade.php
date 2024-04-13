@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addRolesandPermissions">
                <i class="fas fa-plus"></i>
                Create Roles and Permissions
            </button>
            <!-- TableArea -->
            <table class="table table-bordered table-striped mt-2">
                <thead>
                    <tr class="text-center">
                        <th>Roles</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#updateRolesandPermissions">
                                    <i class="fas fa-pen"></i>
                                    update
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- EndTable -->
        </div>
    </section>
</div>



<!-- Add Roles and Permissions Dialog -->
<div class="modal fade" id="addRolesandPermissions" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Add Roles and Permissions</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
                <div class="col-lg-12">
                    <label>Role</label>
                    <input type="text" class="form-control" name="role" id="role" required>
                </div>
                <div class="col-lg-12">
                    <label>Permissions</label>
                    <select class="form-control" name="permissionRole" id="permissionRole" required multiple>
                        <option value="Select All">Select All</option>
                        <option value="Dashboard">Dashboard</option>
                        <option value="Students">Students</option>
                        <option value="Grade Level">Grade Level</option>
                        <option value="Section">Section</option>
                        <option value="Subject">Subject</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Class">Class</option>
                        <option value="Settings">Settings</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-plus"></i>
                  Create
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Add Roles and Permissions Dialog -->




<!-- Update Roles and Permissions Dialog -->
<div class="modal fade" id="updateRolesandPermissions" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Update Roles and Permissions</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
                <div class="col-lg-12">
                    <label>Role</label>
                    <input type="text" class="form-control" name="u_role" id="u_role" required>
                </div>
                <div class="col-lg-12">
                    <label>Permissions</label>
                    <select class="form-control" name="u_permissionRole" id="u_permissionRole" required multiple>
                        <option value="Select All">Select All</option>
                        <option value="Dashboard">Dashboard</option>
                        <option value="Students">Students</option>
                        <option value="Grade Level">Grade Level</option>
                        <option value="Section">Section</option>
                        <option value="Subject">Subject</option>
                        <option value="Teacher">Teacher</option>
                        <option value="Class">Class</option>
                        <option value="Settings">Settings</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-outline-success btn-md">
                  <i class="fas fa-check"></i>
                  update
               </button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of Update Roles and Permissions Dialog -->



<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.rap').forEach(function(element) {
            element.classList.add('activated');
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    var permissionRole = document.getElementById('permissionRole');
    var action = 'add';

    document.getElementById('addRolesandPermissions').addEventListener('click', function() {
        action = 'add';
        permissionRole.id = 'permissionRole';
    });

    document.getElementById('updateRolesandPermissions').addEventListener('click', function() {
        action = 'update';
        permissionRole.id = 'u_permissionRole';
    });

    function toggleSelectedClass(event) {
        var selectedOption = event.target;
        if (selectedOption.tagName === 'OPTION' && selectedOption.value !== '') {
            selectedOption.classList.toggle('selected');
        }
    }

    permissionRole.addEventListener('click', toggleSelectedClass);
    document.getElementById('u_permissionRole').addEventListener('click', toggleSelectedClass);
});

</script>
@endsection