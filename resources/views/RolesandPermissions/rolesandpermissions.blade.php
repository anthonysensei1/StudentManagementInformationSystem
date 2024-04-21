@extends('layout.app')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal"
                    data-target="#addRolesandPermissions">
                    <i class="fas fa-plus"></i>
                    Create Roles and Permissions
                </button>
                <!-- TableArea -->
                <table id="example1" class="table table-bordered table-striped mt-2">
                    <thead>
                        <tr class="text-center">
                            <th>Roles</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @if (count($role_and_permissions) > 0)
                            @foreach ($role_and_permissions as $role_and_permission)
                                <tr class="text-center">
                                    <td>{{ $role_and_permission['role'] }}</td>
                                    <td>{{ $role_and_permission['permission'] }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id=""
                                            data-target="#updateRolesandPermissions" onclick="edit('{{ $role_and_permission['id'] }}', { u_role: '{{ $role_and_permission['role'] }}', u_permissionRole: '{{ $role_and_permission['permission'] }}'})">
                                            <i class="fas fa-pen"></i>
                                            update
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">No data is displayed!</td>
                            </tr>
                        @endif
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
                <form action="{{ route('rolesandpermissions_store') }}" class="formPostSelect">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label>Role</label>
                            <input type="text" class="form-control role" name="role" id="role" value="Teacher"
                                required readonly>
                        </div>
                        <div class="col-lg-12">
                            <label>Permissions</label>
                            <select class="form-control permissionRole" name="permissionRole" id="permissionRole" required
                                multiple>
                                <option value="All">Select All</option>
                                <option value="Dashboard">Dashboard</option>
                                <option value="Students">Students</option>
                                <option value="Grade Level">Grade Level</option>
                                <option value="Section">Section</option>
                                <option value="Subject">Subject</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Class">Class</option>
                                <option value="Payments">Payments</option>
                                <option value="Roles And Permissions">Roles And Permissions</option>
                                <option value="SMS Management">SMS Management"</option>
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
                <form action="{{ route('rolesandpermissions_update') }}" class="formPostSelect">
                    <div class="modal-body">
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                        <div class="col-lg-12">
                            <label>Role</label>
                            <input type="text" class="form-control role" name="role" id="u_role" required>
                        </div>
                        <div class="col-lg-12">
                            <label>Permissions</label>
                            <select class="form-control permissionRole" name="u_permissionRole" id="u_permissionRole" required multiple>
                                <option value="All">Select All</option>
                                <option value="Dashboard">Dashboard</option>
                                <option value="Students">Students</option>
                                <option value="Grade Level">Grade Level</option>
                                <option value="Section">Section</option>
                                <option value="Subject">Subject</option>
                                <option value="Teacher">Teacher</option>
                                <option value="Class">Class</option>
                                <option value="Payments">Payments</option>
                                <option value="Roles And Permissions">Roles And Permissions</option>
                                <option value="SMS Management">SMS Management"</option>
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

            function toggleSelectedClass(event) {
                if (event.target.tagName === 'OPTION' && event.target.value === 'All') {
                    const options = event.target.closest('select').options;
                    const shouldSelect = !event.target.classList.contains('selected');
                    for (let i = 1; i < options.length; i++) {
                        if (shouldSelect) {
                            options[i].classList.add('selected');
                        } else {
                            options[i].classList.remove('selected');
                        }
                    }
                    event.target.classList.toggle('selected');
                } else if (event.target.tagName === 'OPTION') {
                    event.target.classList.toggle('selected');
                }
            }

            const permissionRoleSelects = document.querySelectorAll(
                'select[name="permissionRole"], select[name="u_permissionRole"]');
            permissionRoleSelects.forEach(select => {
                select.addEventListener('click', toggleSelectedClass);
            });

        });
    </script>
@endsection
