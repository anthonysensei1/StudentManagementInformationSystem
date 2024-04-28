@extends('layout.app')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addTeacher">Add New
                    Teacher</button>
                <!-- SearchArea -->
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control form-control-md" name="searcharea" id="searcharea"
                            placeholder="Search . . .">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-md btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!-- EndSearch -->
                <!-- TableArea -->
                <table id="example1" class="table table-bordered table-striped mt-2">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>ID</th>
                            <th>Fullname</th>
                            <th>Username</th>
                            <th>Subject</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $counter = 1;
                        @endphp
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr class="text-center">
                                    <td>{{ $counter }}</td>
                                    <td>{{ $user['employee_id'] }}</td>
                                    <td><a href="" class="view_teacher_class" data-toggle="modal"
                                            data-id="{{ $user['id'] }}" data-target="#popStudentsInfo"
                                            onclick="view('{{ $user['id'] }}', { t_upload_image_name: '{{ $user['upload_image_name'] }}', name: '{{ $user['name'] }}', employee_id: '{{ $user['employee_id'] }}', username: '{{ $user['username'] }}', address: '{{ $user['address'] }}', date: '{{ $user['b_date'] }}', gender: '{{ $user['gender'] == 1 ? 'Male' : 'Female' }}', grade: '{{ $user['grade'] }}', classes: '{{ $user['classes'] }}', contact_number: '{{ $user['contact_number'] }}', email_add: '{{ $user['email_add'] }}', created_at: '{{ $user['created_at'] }}' })">{{ $user['name'] }}</a>
                                    </td>
                                    <td>{{ $user['username'] }}</td>
                                    <td>{{ $user['subject_names'] }}</td>
                                    <td>{{ $user['class_names'] }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-outline-primary btn-md" data-toggle="modal"
                                            data-target="#updateTeacher"
                                            onclick="edit('{{ $user['id'] }}', { u_t_upload_image_name: '{{ $user['upload_image_name'] }}', u_first_name: '{{ $user['first_name'] }}', u_middle_name: '{{ $user['middle_name'] }}', u_last_name: '{{ $user['last_name'] }}', u_employee_id: '{{ $user['employee_id'] }}', u_username: '{{ $user['username'] }}', u_address: '{{ $user['address'] }}', u_b_date: '{{ $user['b_date'] }}', u_gender: '{{ $user['gender'] }}', u_age: '{{ $user['age'] }}', u_contact_number: '{{ $user['contact_number'] }}', u_email_add: '{{ $user['email_add'] }}', u_password: '{{ $user['password'] }}', u_classes_checkbox: '{{ $user['classes'] }}', u_subjects: '{{ $user['subjects'] }}' })">
                                            <i class="fas fa-pen"></i>
                                            update
                                        </button>
                                        <button class="btn btn-outline-danger btn-md" data-toggle="modal"
                                            data-target="#deleteTeacher" onclick="edit('{{ $user['id'] }}')">
                                            <i class="fas fa-trash"></i>
                                            delete
                                        </button>
                                    </td>
                                </tr>
                                @php
                                    $counter++;
                                @endphp
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">No data is displayed!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <!-- EndTable -->
            </div>
        </section>
    </div>


    <!-- MODALS/DIALOGS -->


    <!-- TeachersInfo Dialog -->
    <div class="modal fade" id="popStudentsInfo" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Teachers Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="formPost">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="students_img">
                                <img id="t_upload_image_name" src="{{ asset('dist/img/nopp.png') }}">
                            </div>
                            <div class="fullname text-center"><span id="name"></div>
                        </div>

                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Employee ID :</td>
                                    <td id="employee_id"></td>
                                </tr>
                                <tr>
                                    <td>Username :</td>
                                    <td id="username"></td>
                                </tr>
                                <tr>
                                    <td>Address :</td>
                                    <td id="address"></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth :</td>
                                    <td id="date"></td>
                                </tr>
                                <tr>
                                    <td>Gender :</td>
                                    <td id="gender"></td>
                                </tr>
                                <tr>
                                    <td>Email Address :</td>
                                    <td id="email_add"></td>
                                </tr>
                                <tr>
                                    <td>Contact No. :</td>
                                    <td id="contact_number"></td>
                                </tr>
                                <tr>
                                    <td>Date Created :</td>
                                    <td id="created_at"></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- TableArea -->
                        <table class="table table-bordered table-striped mt-2">
                            <thead>
                                <tr class="text-center">
                                    <th>Subject</th>
                                    <th>Schedule</th>
                                    <th>Grade Level</th>
                                </tr>
                            </thead>
                            <tbody id="classes_table">
                                <tr class="text-center">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- EndTable -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger btn-md" data-dismiss="modal">
                            <i class="fas fa-times"></i>
                            close
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of TeachersInfo Dialog -->


    <!-- Add Dialog -->
    <div class="modal fade" id="addTeacher" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Add New Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('teacher_store') }}" class="formPost">
                    <div class="modal-body">
                        <div class="row students_row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="students_img">
                                        <img class="image" src="{{ asset('dist/img/nopp.png') }}">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input uploadImage" name="upload_img"
                                            id="customFile" required>
                                        <label class="custom-file-label uploadImageLabel" for="customFile">Upload
                                            Image</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control upload_image_name" name="upload_image_name"
                                    id="upload_image_name" readonly hidden>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label for="employee_id">Employee ID :</label>
                                        <input type="number" class="form-control" name="employee_id" id="employee_id"
                                            required placeholder="employee ID">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="first_name">Firstname</label>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            required placeholder="firstname">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="middle_name">Middlename</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name"
                                            placeholder="middlename">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="last_name">Lastname</label>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            required placeholder="lastname">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            required placeholder="address" autocomplete="address">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="contact_number">Contact Number</label>
                                        <input type="number" class="form-control" name="contact_number"
                                            id="contact_number" required placeholder="Ex.09123456789">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="t_email_add">Email Address</label>
                                        <input type="email" class="form-control" name="email_add" id="t_email_add"
                                            required placeholder="email address">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="date">Date of Birth</label>
                                        <input type="date" class="form-control date" name="b_date" id="b_date"
                                            required placeholder="date">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control age" name="age" id="age"
                                            required readonly>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="g_label">Gender</span>
                                        <div class="radio-wrapper">
                                            <div class="radios">
                                                <input type="radio" class="form-control" name="gender[]"
                                                    id="g_male" value="1" required>
                                                <label for="g_male">Male</label>
                                            </div>
                                            <div class="radios">
                                                <input type="radio" class="form-control" name="gender[]"
                                                    id="g_female" value="2" required>
                                                <label for="g_female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                            required placeholder="username">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            required placeholder="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 table_classes">
                                <!-- TableArea -->
                                <table class="table table-bordered table-striped mt-2">
                                    <thead>
                                        <tr class="text-center">
                                            <th>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="" name="check1" id="check1"
                                                        disabled>
                                                    <label for="check1"></label>
                                                </div>
                                            </th>
                                            <th>Subject</th>
                                            <th>Schedule</th>
                                            <th>Grade Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr class="text-center"
                                                data-grade-level-id="{{ $subject['grade_level_id'] }}" hidden>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="check2" name="subjects[]"
                                                            value="{{ $subject['id'] }}"
                                                            id="check2_{{ $subject['id'] }}">
                                                        <label for="check2_{{ $subject['id'] }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $subject['subject_name'] }}</td>
                                                <td>{{ $subject['schedule_time'] }} - {{ $subject['schedule_time_end'] }}
                                                </td>
                                                <td>Grade {{ $subject['grade'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- EndTable -->
                                <div class="col-lg-12">
                                    <span class="classes">Classes</span>
                                    <div class="radio-wrapper-classes mt-3">
                                        @foreach ($classes as $class)
                                            <div class="radios_classes">
                                                <input type="checkbox" class="classes_checkbox"
                                                    name="classes[]" data-classes-value="{{ $class['grade_level'] }}"
                                                    value="{{ $class['id'] }}" id="classes_{{ $class['id'] }}">
                                                <label class="class_check_lbl" for="classes_{{ $class['id'] }}">Grade {{ $class['grade'] }} -
                                                    {{ $class['section_name'] }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success btn-md">
                            <i class="fas fa-check"></i>
                            Register
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of Add Dialog -->


    <!-- Update Dialog -->
    <div class="modal fade" id="updateTeacher" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Update Teacher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('teacher_update') }}" class="formPost">
                    <div class="modal-body">
                        <div class="row students_row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="students_img">
                                        <img class="image" id="u_image" src="{{ asset('dist/img/nopp.png') }}">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input uploadImage" name="upload_img"
                                            id="u_customFile">
                                        <label class="custom-file-label uploadImageLabel" for="u_customFile">Upload
                                            Image</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="text" class="form-control id" name="id" id="id" readonly
                                        hidden>
                                    <input type="text" class="form-control upload_image_name" name="upload_image_name"
                                        id="u_t_upload_image_name" readonly hidden>
                                    <div class="col-lg-12">
                                        <label for="u_employee_id">Employee ID</label>
                                        <input type="number" class="form-control" name="employee_id" id="u_employee_id"
                                            required placeholder="employee ID">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="u_first_name">Firstname</label>
                                        <input type="text" class="form-control" name="first_name" id="u_first_name"
                                            required placeholder="firstname">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="u_middle_name">Middlename</label>
                                        <input type="text" class="form-control" name="middle_name" id="u_middle_name"
                                            placeholder="middlename">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="u_last_name">Lastname</label>
                                        <input type="text" class="form-control" name="last_name" id="u_last_name"
                                            required placeholder="lastname">
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="u_address">Address</label>
                                        <input type="text" class="form-control" name="address" id="u_address"
                                            required placeholder="address" autocomplete="address">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="u_contact_number">Contact Number</label>
                                        <input type="number" class="form-control" name="contact_number"
                                            id="u_contact_number" required placeholder="Ex.09123456789">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="u_email_add">Email Address</label>
                                        <input type="text" class="form-control" name="email_add" id="u_email_add"
                                            required placeholder="email address">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="u_b_date">Date of Birth</label>
                                        <input type="date" class="form-control" name="b_date" id="u_b_date"
                                            required placeholder="date">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="u_age">Age</label>
                                        <input type="number" class="form-control" name="age" id="u_age"
                                            required readonly>
                                    </div>
                                    <div class="col-lg-3">
                                        <span class="g_label">Gender</span>
                                        <div class="radio-wrapper">
                                            <div class="radios">
                                                <input type="radio" class="form-control" name="u_gender[]"
                                                    id="u_g_male" value="1" required>
                                                <label for="u_g_male">Male</label>
                                            </div>
                                            <div class="radios">
                                                <input type="radio" class="form-control" name="u_gender[]"
                                                    id="u_g_female" value="2" required>
                                                <label for="u_g_female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="u_username"
                                            required placeholder="username">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="u_password"
                                            required placeholder="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 u_table_classes">
                                <!-- TableArea -->
                                <table class="table table-bordered table-striped mt-2">
                                    <thead>
                                        <tr class="text-center">
                                            <th>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="" id="u_check1" disabled>
                                                    <label for="u_check1"></label>
                                                </div>
                                            </th>
                                            <th>Subject</th>
                                            <th>Schedule</th>
                                            <th>Grade Level</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr class="text-center"
                                                data-grade-level-id="{{ $subject['grade_level_id'] }}" data-section-id="{{ $subject['id'] }}" hidden>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" class="u_check2" name="u_subjects[]"
                                                            value="{{ $subject['id'] }}"
                                                            id="u_check2_{{ $subject['id'] }}">
                                                        <label for="u_check2_{{ $subject['id'] }}"></label>
                                                    </div>
                                                </td>
                                                <td>{{ $subject['subject_name'] }}</td>
                                                <td>{{ $subject['schedule_time'] }} - {{ $subject['schedule_time_end'] }}
                                                </td>
                                                <td>Grade {{ $subject['grade'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- EndTable -->
                                <div class="col-lg-12">
                                    <span class="classes">Classes</span>
                                    <div class="radio-wrapper-classes mt-3">
                                        @foreach ($classes as $class)
                                            <div class="radios_classes">
                                                <input type="checkbox" class="form-control classes_checkbox"
                                                    name="u_classes[]" data-classes-value="{{ $class['grade_level'] }}"
                                                    value="{{ $class['id'] }}" id="u_classes_{{ $class['id'] }}">
                                                <label class="class_check_lbl" for="u_classes_{{ $class['id'] }}">Grade {{ $class['grade'] }} -
                                                    {{ $class['section_name'] }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary btn-md">
                            <i class="fas fa-check"></i>
                            update
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of Update Dialog -->


    <!-- Delete Dialog -->
    <div class="modal fade" id="deleteTeacher" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('teacher_destroy') }}" class="formPost">
                    <div class="modal-body">
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                        <h4>Are you certain you wish to proceed with the deletion?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success btn-md">
                            <i class="fas fa-check"></i>
                            yes
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-md" data-dismiss="modal">
                            <i class="fas fa-times"></i>
                            cancel
                        </button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of Delete Dialog -->


    <script>
        $(document).ready(function() {
            $('#popStudentsInfo').on('show.bs.modal', function(e) {});
            $('#popStudentsInfo').on('hide.bs.modal', function(e) {});
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.tea').forEach(function(element) {
                element.classList.add('activated');
            });
        });
    </script>
    <script type="text/javascript">
        calculateAndUpdateAge('b_date', 'age');
        calculateAndUpdateAge('u_b_date', 'u_age');

        function calculateAndUpdateAge(inputFieldId, outputFieldId) {
            $(`#${inputFieldId}`).on('change', function() {
                var inputDate = new Date($(this).val());
                var currentDate = new Date();
                var ageDifMs = currentDate - inputDate.getTime();
                var ageDate = new Date(ageDifMs);
                var age = Math.abs(ageDate.getUTCFullYear() - 1970);

                $(`#${outputFieldId}`).val(age);
            });
        }

        $('.uploadImage').on('change', function() {
            const file = $(this)[0].files[0];
            const formData = new FormData();

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500
            });

            if (file.type.match('image.*')) {

                formData.append('image', file);

                $.ajax({
                    url: "{{ route('teacher_upload') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {

                        switch (data['response']) {
                            case 1:
                                $('.image').attr('src', '{{ asset('images_teacher/') }}' + '/' + data[
                                    'message']);
                                $('.uploadImageLabel').text(data['message']);
                                $('.upload_image_name').val(data['message']);
                                break;
                            default:
                                Toast.fire({
                                    icon: 'error',
                                    title: '<p class="text-center pt-2">' + data['message'] +
                                        '</p>'
                                });
                                break;
                        }

                    }
                });
            } else {
                Toast.fire({
                    icon: 'error',
                    title: '<p class="text-center pt-2">Please select an image file.</p>'
                });
                $(this).val('');
            }
        });

        $('.view_teacher_class').on('click', function(e) {
            e.preventDefault();
            const id = $(this).attr('data-id');
            const path = "{{ route('teacher_classes', ['id' => ':id']) }}".replace(':id', id);
            $.ajax({
                type: "GET",
                cache: false,
                url: path,
                data: {
                    id: id
                },
                success: function(data) {

                    var $table = $('#classes_table');
                    $table.empty();

                    $.each(data, function(i, cls) {
                        var $row = $('<tr>').append(
                            $('<td>').text(cls.subject_name),
                            $('<td>').text(cls.schedule_time + " - " + cls
                                .schedule_time_end),
                            $('<td>').text(cls.grade),
                        );
                        $table.append($row);
                    });

                }
            });

        });
    </script>
@endsection
