@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addStudent">Add New Student</button>
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#enrolledStudent">Enrolled Student</button>
            <!-- SearchArea -->
            <form action="#">
                <div class="input-group">
                    <input type="search" class="form-control form-control-md" name="searcharea" id="searcharea" placeholder="Search . . .">
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
                        <th>ID no.</th>
                        <th>LRN</th>
                        <th>Fullname</th>
                        <th>Student Status</th>
                        <th>Enrollment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @if (count($students) > 0)
                       @foreach ($students as $student)
                        <tr class="text-center">
                            <td>{{ $counter }}</td>
                            <td>{{ $student['id_no'] }}</td>
                            <td>{{ $student['lrn'] }}</td>
                            <td><a href="" class="student_name" data-toggle="modal" data-target="#popStudentsInfo" onclick="view('{{ $student['id'] }}', { upload_image_name: '{{ $student['upload_image_name'] }}', id_no: '{{ $student['id_no'] }}', lrn: '{{ $student['lrn'] }}', first_name: '{{ $student['first_name'] }}', middle_name: '{{ $student['middle_name'] }}', last_name: '{{ $student['last_name'] }}', address: '{{ $student['address'] }}', b_date: '{{ $student['b_date'] }}', age: '{{ $student['age'] }}', age: '{{ $student['age'] }}', gender: '{{ $student['gender'] == 1 ? 'Male' : 'Female' }}', grade_level: '{{ $student['grade'] }}', section: '{{ $student['section_name'] }}', p_first_name: '{{ $student['p_first_name'] }}', p_middle_name: '{{ $student['p_middle_name'] }}', p_last_name: '{{ $student['p_last_name'] }}', contact_number: '{{ $student['contact_number'] }}', email_add: '{{ $student['email_add'] }}', created_at: '{{ $student['created_at'] }}' })">{{ $student['first_name'] }} {{ $student['middle_name'] }} {{ $student['last_name'] }}</a></td>
                            <td>Grade {{ $student['grade'] }} - {{ $student['section_name'] }}</td>
                            <td class="text-center">

                            <button class="btn btn-outline-success btn-md">Enroll</button>

                            <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#updateStudent" onclick="edit('{{ $student['id'] }}', { u_upload_image_name: '{{ $student['upload_image_name'] }}', u_id_no: '{{ $student['id_no'] }}', u_lrn: '{{ $student['lrn'] }}', u_first_name: '{{ $student['first_name'] }}', u_middle_name: '{{ $student['middle_name'] }}', u_last_name: '{{ $student['last_name'] }}', u_address: '{{ $student['address'] }}', u_b_date: '{{ $student['b_date'] }}', u_age: '{{ $student['age'] }}', u_gender: '{{ $student['gender'] }}', u_grade_level_: '{{ $student['grade_level'] }}', u_section_: '{{ $student['section'] }}', u_p_first_name: '{{ $student['p_first_name'] }}', u_p_middle_name: '{{ $student['p_middle_name'] }}', u_p_last_name: '{{ $student['p_last_name'] }}', u_contact_number: '{{ $student['contact_number'] }}', u_email_add: '{{ $student['email_add'] }}' })">
                                    <i class="fas fa-pen"></i>
                                    update
                            </button>
                            <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-target="#deleteStudent" onclick="edit('{{ $student['id'] }}')">
                                    <i class="fas fa-trash"></i>
                                    delete
                            </button>
                            </td>
                        </tr>
                        @php
                            $counter++;
                        @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>
            <!-- EndTable -->
        </div>
    </section>
</div>


<!-- MODALS/DIALOGS -->


<!-- StudentsInfo Dialog -->
<div class="modal fade" id="popStudentsInfo" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Students Information</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" class="formPost">
            <div class="modal-body">
                <div class="form-group">
                    <div class="students_img">
                        <img id="upload_image_name" src="{{asset ('dist/img/nopp.png')}}">
                    </div>
                    <div class="fullname text-center"><span id="first_name"></span> <span id="middle_name"></span> <span id="last_name"></span></div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>ID no.</td>
                            <td id="id_no">003</td>
                        </tr>
                        <tr>
                            <td>LRN</td>
                            <td id="lrn">100078457</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td id="address">Dagohoy, Bohol</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td id="gender">Female</td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                            <td id="created_at">10/30/2023</td>
                        </tr>
                        <tr>
                            <td>Grade</td>
                            <td id="grade_level">Grade 2</td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td id="section">A</td>
                        </tr>
                        <tr>
                            <td>Parent/Guardian Name</td>
                            <td id="p_first_name">Juan Dela Cruz</td>
                        </tr>
                        <tr>
                            <td>Contact No.</td>
                            <td id="contact_number">09123456789</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td id="email_add">juandelacruz@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
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
<!-- End of StudentsInfo Dialog -->


<!-- Add Dialog -->
<div class="modal fade" id="addStudent" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Add New Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('students_store') }}" class="formPost">
            <div class="modal-body">
                <div class="students_info">Students Basic Information</div>
                <div class="row students_row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="students_img">
                                <img class="image" src="{{asset ('dist/img/nopp.png')}}">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input uploadImage" name="upload_img" id="customFile" required>
                                <label class="custom-file-label uploadImageLabel" for="customFile">Upload Image</label>
                            </div>
                        </div>
                        <input type="text" class="form-control upload_image_name" name="upload_image_name" id="upload_image_name" readonly hidden>
                    </div>
                    <div class="col-lg-6">
                        <label for="id_no">ID no</label>
                        <input type="number" class="form-control" name="id_no" id="id_no" required placeholder="000000000000">
                    </div>
                    <div class="col-lg-6">
                        <label for="lrn">LRN</label>
                        <input type="number" class="form-control" name="lrn" id="lrn" required placeholder="000000000000">
                    </div>
                    <div class="col-lg-4">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" required placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <label for="middlename">Middlename</label>
                        <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" required placeholder="lastname">
                    </div>
                    <div class="col-lg-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" required placeholder="address">
                    </div>
                    <div class="col-lg-6">
                        <label for="date">Date of Birth</label>
                        <input type="date" class="form-control date" name="b_date" id="b_date" required placeholder="date">
                    </div>
                    <div class="col-lg-3">
                        <label for="age">Age</label>
                        <input type="number" class="form-control age" name="age" id="age" readonly required>
                    </div>
                    <div class="col-lg-3">
                        <span class="g_label">Gender</span>
                        <div class="radio-wrapper">
                            <div class="radios form-check">
                                <input type="radio" class="form-control" name="gender[]" id="g_male" value="1" required>
                                <label for="g_male">Male</label>
                            </div>
                            <div class="radios form-check">
                                <input type="radio" class="form-control" name="gender[]" id="g_female" value="2" required>
                                <label for="g_female">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label for="age">Student Status</label>
                        <select name="student_status" id="student_status" class="form-control">
                            <option value="0">Old</option>
                            <option value="1">New</option>
                            <option value="2">Transferee</option>
                            <option value="3">Continuing</option>
                        </select>
                    </div>
                    <!-- GradeLevelArea -->
                    <!-- <div class="col-lg-12">
                        <span class="gl_label">Grade Level</span>
                        <div class="radio-wrapper-grade-level">
                            @foreach ($grades as $grade)
                                <div class="radios_gl">
                                    <input type="radio" class="form-control grade_level_{{ $grade['id'] }}" name="grade_level[]" id="grade_level_{{ $grade['id'] }}" value="{{ $grade['id'] }}">
                                    <label for="grade_level_{{ $grade['id'] }}">Grade {{ $grade['grade'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div> -->
                    <!-- SectionArea -->
                    <!-- <div class="col-lg-12">
                        <span class="section_label">Section</span>
                        <div class="radio-wrapper-section">
                            @foreach ($sections as $section)
                                <div class="radios_section" data-grade_level_id="{{ $section['grade_level_id'] }}" hidden>
                                    <input type="radio" class="form-control" name="section[]" id="section{{ $section['id'] }}" value="{{ $section['id'] }}">
                                    <label for="section{{ $section['id'] }}">{{ $section['section'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div> -->
                </div>
                <div class="students_parents_info mt-3">Students Parents/Guardian Basic Information</div>
                <div class="row students_parents_row">
                    <div class="col-lg-4">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="p_first_name" id="p_first_name" required placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <label>Middlename</label>
                        <input type="text" class="form-control" name="p_middle_name" id="p_middle_name" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <label>Lastname</label>
                        <input type="text" class="form-control" name="p_last_name" id="p_last_name" required placeholder="lastname">
                    </div>
                    <div class="col-lg-6">
                        <label>Contact Number</label>
                        <input type="number" class="form-control" name="contact_number" id="contact_number" placeholder="Ex.09123456789">
                    </div>
                    <div class="col-lg-6">
                        <label>Email Address <span class="optional">(optional)</span></label>
                        <input type="text" class="form-control" name="email_add" id="email_add" placeholder="email address">
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
<div class="modal fade" id="updateStudent" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Update Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('students_update') }}" class="formPost">
            <div class="modal-body">
                <div class="students_info">Students Basic Information</div>
                <div class="row students_row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="students_img">
                                <img class="image" id="u_image" src="{{asset ('dist/img/nopp.png')}}">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input uploadImage" name="upload_img" id="customFile">
                                <label class="custom-file-label uploadImageLabel" for="u_customFile">Upload Image</label>
                            </div>
                        </div>
                    </div>
                    <input type="text" class="form-control upload_image_name" name="upload_image_name" id="u_upload_image_name" readonly hidden>
                    <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                    <div class="col-lg-6">
                        <label for="u_id_no">ID no</label>
                        <input type="number" class="form-control" name="id_no" id="u_id_no" required placeholder="000000000000">
                    </div>
                    <div class="col-lg-6">
                        <label for="u_lrn">LRN</label>
                        <input type="number" class="form-control" name="lrn" id="u_lrn" required placeholder="000000000000">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_first_name">Firstname</label>
                        <input type="text" class="form-control" name="first_name" id="u_first_name" required placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_middle_name">Middlename</label>
                        <input type="text" class="form-control" name="middle_name" id="u_middle_name" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_last_name">Lastname</label>
                        <input type="text" class="form-control" name="last_name" id="u_last_name" required placeholder="lastname">
                    </div>
                    <div class="col-lg-12">
                        <label for="u_address">Address</label>
                        <input type="text" class="form-control" name="address" id="u_address" required placeholder="address">
                    </div>
                    <div class="col-lg-6">
                        <label for="u_b_date">Date of Birth</label>
                        <input type="date" class="form-control u_b_date" name="b_date" id="u_b_date" required placeholder="date">
                    </div>
                    <div class="col-lg-3">
                        <label for="u_age">Age</label>
                        <input type="number" class="form-control age" name="age" id="u_age" required readonly>
                    </div>
                    <div class="col-lg-3">
                        <span class="g_label">Gender</span>
                        <div class="radio-wrapper">
                            <div class="radios">
                                <input type="radio" class="form-control" name="u_gender[]" id="u_gender" value="1" required>
                                <label for="g_male">Male</label>
                            </div>
                            <div class="radios">
                                <input type="radio" class="form-control" name="u_gender[]" id="u_gender" value="2" required>
                                <label for="g_female">Female</label>
                            </div>
                        </div>
                    </div>
                    <!-- GradeLevelArea -->
                    <div class="col-lg-12">
                        <span class="gl_label">Grade Level</span>
                        <div class="radio-wrapper-grade-level">
                            @foreach ($grades as $grade)
                                <div class="radios_gl">
                                    <input type="radio" class="form-control grade_level_{{ $grade['id'] }}" name="u_grade_level_[]" id="u_grade_level_{{ $grade['id'] }}" value="{{ $grade['id'] }}">
                                    <label for="u_grade_level_{{ $grade['id'] }}">Grade {{ $grade['grade'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- SectionArea -->
                    <div class="col-lg-12">
                        <span class="section_label">Section</span>
                        <div class="radio-wrapper-section">
                            @foreach ($sections as $section)
                                <div class="u_radios_section" data-u_grade_level_id="{{ $section['grade_level_id'] }}" hidden>
                                    <input type="radio" class="form-control" name="u_section_[]" id="u_section_{{ $section['id'] }}" value="{{ $section['id'] }}">
                                    <label for="u_section_{{ $section['id'] }}">{{ $section['section'] }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- ParentsInformationArea -->
                <div class="students_parents_info mt-3">Students Parents/Guardian Basic Information</div>
                <div class="row students_parents_row">
                    <div class="col-lg-4">
                        <label>Firstname</label>
                        <input type="text" class="form-control" name="p_first_name" id="u_p_first_name" required placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_p_middle_name">Middlename</label>
                        <input type="text" class="form-control" name="p_middle_name" id="u_p_middle_name" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_p_last_name">Lastname</label>
                        <input type="text" class="form-control" name="p_last_name" id="u_p_last_name" required placeholder="lastname">
                    </div>
                    <div class="col-lg-6">
                        <label for="u_contact_number">Contact Number</label>
                        <input type="number" class="form-control" name="contact_number" id="u_contact_number" placeholder="Ex.09123456789">
                    </div>
                    <div class="col-lg-6">
                        <label>Email Address <span class="optional">(optional)</span></label>
                        <input type="text" class="form-control" name="email_add" id="u_email_add" placeholder="email address">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary btn-md">
                    update
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
<!-- End of Update Dialog -->


<!-- Delete Dialog -->
<div class="modal fade" id="deleteStudent" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{ route('students_destroy') }}" class="formPost">
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
    $(document).ready(function () {
        $('#popStudentsInfo').on('show.bs.modal', function (e) {
        });
        $('#popStudentsInfo').on('hide.bs.modal', function (e) {
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.stu').forEach(function(element) {
            element.classList.add('activated');
        });
    });
</script>
<script type="text/javascript">

calculateAndUpdateAge('b_date', 'age');
calculateAndUpdateAge('u_b_date', 'u_age');

function calculateAndUpdateAge(inputFieldId, outputFieldId) {
    $(`#${inputFieldId}`).on('change', function(){
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
            url: "{{ route('students_upload') }}",
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
                        $('.image').attr('src', '{{ asset("images/") }}' +'/'+ data['message']);
                        $('.uploadImageLabel').text(data['message']);
                        $('.upload_image_name').val(data['message']);
                        break;
                    default:
                        Toast.fire({
                            icon: 'error',
                            title: '<p class="text-center pt-2">' + data['message'] + '</p>'
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

 </script>

@endsection