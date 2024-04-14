@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addStudent">Add New Student</button>
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
                        <th>Grade and Section</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><a href="" class="student_name" data-toggle="modal" data-target="#popStudentsInfo">Nekka H. Jeminos</a></td>
                        <td></td>
                        <td class="text-center">
                        <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#updateStudent">
                                <i class="fas fa-pen"></i>
                                update
                        </button>
                        <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-id="" data-target="#deleteStudent">
                                <i class="fas fa-trash"></i>
                                delete
                        </button>
                        </td>
                    </tr>
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
                        <img src="{{asset ('dist/img/nopp.png')}}">
                    </div>
                    <div class="fullname text-center">Nekka H. Jeminos</div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>ID no.</td>
                            <td>003</td>
                        </tr>
                        <tr>
                            <td>LRN</td>
                            <td>100078457</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>Dagohoy, Bohol</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>Female</td>
                        </tr>
                        <tr>
                            <td>Date Created</td>
                            <td>10/30/2023</td>
                        </tr>
                        <tr>
                            <td>Grade</td>
                            <td>Grade 2</td>
                        </tr>
                        <tr>
                            <td>Section</td>
                            <td>A</td>
                        </tr>
                        <tr>
                            <td>Parent/Guardian Name</td>
                            <td>Juan Dela Cruz</td>
                        </tr>
                        <tr>
                            <td>Contact No.</td>
                            <td>09123456789</td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>juandelacruz@gmail.com</td>
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
            <form action="#" class="formPost">
            <div class="modal-body">
                <div class="students_info">Students Basic Information</div>
                <div class="row students_row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="students_img">
                                <img src="{{asset ('dist/img/nopp.png')}}">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="upload_img" id="customFile">
                                <label class="custom-file-label" for="customFile">Upload Image</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="id_no">ID no</label>
                        <input type="text" class="form-control" name="id_no" id="id_no" required placeholder="000000000000">
                    </div>
                    <div class="col-lg-6">
                        <label for="lrn">LRN</label>
                        <input type="text" class="form-control" name="lrn" id="lrn" required placeholder="000000000000">
                    </div>
                    <div class="col-lg-4">
                        <label for="firstname">Firstname</label>
                        <input type="text" class="form-control" name="firstname" id="firstname" required placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <label for="middlename">Middlename</label>
                        <input type="text" class="form-control" name="middlename" id="middlename" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" name="lastname" id="lastname" required placeholder="lastname">
                    </div>
                    <div class="col-lg-12">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" required placeholder="address">
                    </div>
                    <div class="col-lg-6">
                        <label for="date">Date of Birth</label>
                        <input type="date" class="form-control" name="date" id="date" required placeholder="date">
                    </div>
                    <div class="col-lg-3">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" name="age" id="age" required>
                    </div>
                    <div class="col-lg-3">
                        <span class="g_label">Gender</span>
                        <div class="radio-wrapper">
                            <div class="radios">
                                <input type="radio" class="form-control" name="g_male" id="g_male" required>
                                <label for="g_male">Male</label>
                            </div>
                            <div class="radios">
                                <input type="radio" class="form-control" name="g_female" id="g_female" required>
                                <label for="g_female">Female</label>
                            </div>
                        </div>
                    </div>
                    <!-- GradeLevelArea -->
                    <div class="col-lg-12">
                        <span class="gl_label">Grade Level</span>
                        <div class="radio-wrapper-grade-level">
                            <div class="radios_gl">
                                <input type="radio" class="form-control" name="grade_level" id="grade_level" required>
                                <label for="grade_level">Nursery</label>
                            </div>
                            <div class="radios_gl">
                                <input type="radio" class="form-control" name="grade_level" id="grade_level1" required>
                                <label for="grade_level1">Grade 1</label>
                            </div>
                            <div class="radios_gl">
                                <input type="radio" class="form-control" name="grade_level" id="grade_level2" required>
                                <label for="grade_level2">Grade 2</label>
                            </div>
                        </div>
                    </div>
                    <!-- SectionArea -->
                    <div class="col-lg-12">
                        <span class="section_label">Section</span>
                        <div class="radio-wrapper-section">
                            <div class="radios_section">
                                <input type="radio" class="form-control" name="section" id="section" required>
                                <label for="section">A</label>
                            </div>
                            <div class="radios_section">
                                <input type="radio" class="form-control" name="section" id="section1" required>
                                <label for="section1">B</label>
                            </div>
                            <div class="radios_section">
                                <input type="radio" class="form-control" name="section" id="section2" required>
                                <label for="section2">C</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ParentsInformationArea -->
                <div class="students_parents_info mt-3">Students Parents/Guardian Basic Information</div>
                <div class="row students_parents_row">
                    <div class="col-lg-4">
                        <label for="p_firstname">Firstname</label>
                        <input type="text" class="form-control" name="p_firstname" id="p_firstname" required placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <label for="p_middlename">Middlename</label>
                        <input type="text" class="form-control" name="p_middlename" id="p_middlename" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <label for="p_lastname">Lastname</label>
                        <input type="text" class="form-control" name="p_lastname" id="p_lastname" required placeholder="lastname">
                    </div>
                    <div class="col-lg-6">
                        <label for="contactnumber">Contact Number</label>
                        <input type="text" class="form-control" name="contactnumber" id="contactnumber" placeholder="Ex.09123456789">
                    </div>
                    <div class="col-lg-6">
                        <label for="emailadd">Email Address <span class="optional">(optional)</span></label>
                        <input type="text" class="form-control" name="emailadd" id="emailadd" placeholder="email address">
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
            <form action="#" class="formPost">
            <div class="modal-body">
                <div class="students_info">Students Basic Information</div>
                <div class="row students_row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <div class="students_img">
                                <img src="{{asset ('dist/img/nopp.png')}}">
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="u_upload_img" id="customFile">
                                <label class="custom-file-label" for="customFile">Upload Image</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label for="u_id_no">ID no</label>
                        <input type="text" class="form-control" name="u_id_no" id="u_id_no" required placeholder="000000000000">
                    </div>
                    <div class="col-lg-6">
                        <label for="u_lrn">LRN</label>
                        <input type="text" class="form-control" name="u_lrn" id="u_lrn" required placeholder="000000000000">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_firstname">Firstname</label>
                        <input type="text" class="form-control" name="u_firstname" id="u_firstname" required placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_middlename">Middlename</label>
                        <input type="text" class="form-control" name="u_middlename" id="u_middlename" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_lastname">Lastname</label>
                        <input type="text" class="form-control" name="u_lastname" id="u_lastname" required placeholder="lastname">
                    </div>
                    <div class="col-lg-12">
                        <label for="u_address">Address</label>
                        <input type="text" class="form-control" name="u_address" id="u_address" required placeholder="address">
                    </div>
                    <div class="col-lg-6">
                        <label for="u_date">Date of Birth</label>
                        <input type="date" class="form-control" name="u_date" id="u_date" required placeholder="date">
                    </div>
                    <div class="col-lg-3">
                        <label for="u_age">Age</label>
                        <input type="text" class="form-control" name="u_age" id="u_age" required>
                    </div>
                    <div class="col-lg-3">
                        <span class="g_label">Gender</span>
                        <div class="radio-wrapper">
                            <div class="radios">
                                <input type="radio" class="form-control" name="u_g_male" id="u_g_male" required>
                                <label for="u_g_male">Male</label>
                            </div>
                            <div class="radios">
                                <input type="radio" class="form-control" name="u_g_female" id="u_g_female" required>
                                <label for="u_g_female">Female</label>
                            </div>
                        </div>
                    </div>
                    <!-- GradeLevelArea -->
                    <div class="col-lg-12">
                        <span class="gl_label">Grade Level</span>
                        <div class="radio-wrapper-grade-level">
                            <div class="radios_gl">
                                <input type="radio" class="form-control" name="u_grade_level" id="u_grade_level" required>
                                <label for="u_grade_level">Nursery</label>
                            </div>
                            <div class="radios_gl">
                                <input type="radio" class="form-control" name="u_grade_level" id="u_grade_level1" required>
                                <label for="u_grade_level1">Grade 1</label>
                            </div>
                            <div class="radios_gl">
                                <input type="radio" class="form-control" name="u_grade_level" id="u_grade_level2" required>
                                <label for="u_grade_level2">Grade 2</label>
                            </div>
                        </div>
                    </div>
                    <!-- SectionArea -->
                    <div class="col-lg-12">
                        <span class="section_label">Section</span>
                        <div class="radio-wrapper-section">
                            <div class="radios_section">
                                <input type="radio" class="form-control" name="u_section" id="u_section" required>
                                <label for="u_section">A</label>
                            </div>
                            <div class="radios_section">
                                <input type="radio" class="form-control" name="u_section" id="u_section1" required>
                                <label for="u_section1">B</label>
                            </div>
                            <div class="radios_section">
                                <input type="radio" class="form-control" name="u_section" id="u_section2" required>
                                <label for="u_section2">C</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ParentsInformationArea -->
                <div class="students_parents_info mt-3">Students Parents/Guardian Basic Information</div>
                <div class="row students_parents_row">
                    <div class="col-lg-4">
                        <label for="u_p_firstname">Firstname</label>
                        <input type="text" class="form-control" name="u_p_firstname" id="u_p_firstname" required placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_p_middlename">Middlename</label>
                        <input type="text" class="form-control" name="u_p_middlename" id="u_p_middlename" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <label for="u_p_lastname">Lastname</label>
                        <input type="text" class="form-control" name="u_p_lastname" id="u_p_lastname" required placeholder="lastname">
                    </div>
                    <div class="col-lg-6">
                        <label for="u_contactnumber">Contact Number</label>
                        <input type="text" class="form-control" name="u_contactnumber" id="u_contactnumber" placeholder="Ex.09123456789">
                    </div>
                    <div class="col-lg-6">
                        <label for="u_emailadd">Email Address <span class="optional">(optional)</span></label>
                        <input type="text" class="form-control" name="u_emailadd" id="u_emailadd" placeholder="email address">
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
         <form action="#" class="formPost">
            <div class="modal-body">
               <input type="text" class="form-control u_id" name="d_id" id="d_id" readonly hidden>
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

@endsection