@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addTeacher">Add New Teacher</button>
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
            <table class="table table-bordered table-striped mt-2">
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
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td><a href="" class="student_name" data-toggle="modal" data-target="#popStudentsInfo">Bless S. Muring</a></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                        <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#updateTeacher">
                              <i class="fas fa-pen"></i>
                              update
                        </button>
                        <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-id="" data-target="#deleteTeacher">
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
                        <img src="{{asset ('dist/img/nopp.png')}}">
                  </div>
                  <div class="fullname text-center">Bless S. Muring</div>
               </div>
               <table class="table">
                  <tbody>
                     <tr>
                           <td>Employee ID :</td>
                           <td>12345</td>
                     </tr>
                     <tr>
                           <td>Username :</td>
                           <td>bless</td>
                     </tr>
                     <tr>
                           <td>Address :</td>
                           <td>Trinidad, Bohol</td>
                     </tr>
                     <tr>
                           <td>Date of Birth :</td>
                           <td>12/25/2001</td>
                     </tr>
                     <tr>
                           <td>Gender :</td>
                           <td>Female</td>
                     </tr>
                     <tr>
                           <td>Email Address :</td>
                           <td>sample@gmail.com </td>
                     </tr>
                     <tr>
                           <td>Contact No. :</td>
                           <td>09123456789</td>
                     </tr>
                     <tr>
                           <td>Date Created :</td>
                           <td>10/10/2024</td>
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
                  <tbody>
                     <tr class="text-center">
                        <td>ENG</td>
                        <td>8:00 - 9:00</td>
                        <td>Grade 2 - A</td>
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
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="row students_row">
                  <div class="col-lg-6">
                     <div class="form-group">
                           <div class="students_img">
                              <img src="{{asset ('dist/img/nopp.png')}}">
                           </div>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="upload_img" id="customFile">
                              <label class="custom-file-label" for="customFile">Upload Image</label>
                           </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="employee_id">Employee ID :</label>
                           <input type="text" class="form-control" name="employee_id" id="employee_id" required placeholder="employee ID">
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
                           <input type="text" class="form-control" name="address" id="address" required placeholder="address" autocomplete="address">
                        </div>
                        <div class="col-lg-6">
                           <label for="contact_num">Contact Number</label>
                           <input type="text" class="form-control" name="contact_num" id="contact_num" required placeholder="Ex.09123456789">
                        </div>
                        <div class="col-lg-6">
                           <label for="t_emailadd">Email Address</label>
                           <input type="text" class="form-control" name="t_emailadd" id="t_emailadd" required placeholder="email address">
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
                                    <input type="radio" class="form-control" name="t_g_male" id="t_g_male" required>
                                    <label for="t_g_male">Male</label>
                                 </div>
                                 <div class="radios">
                                    <input type="radio" class="form-control" name="t_g_female" id="t_g_female" required>
                                    <label for="t_g_female">Female</label>
                                 </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <label for="username">Username</label>
                           <input type="text" class="form-control" name="username" id="username" required placeholder="username">
                        </div>
                        <div class="col-lg-6">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" name="password" id="password" required placeholder="password">
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- TableArea -->
                     <table class="table table-bordered table-striped mt-2">
                        <thead>
                           <tr class="text-center">
                              <th>
                                 <div class="icheck-primary">
                                    <input type="checkbox" value="" id="check1">
                                    <label for="check1"></label>
                                 </div>
                              </th>
                              <th>Subject</th>
                              <th>Schedule</th>
                              <th>Grade Level</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="text-center">
                              <td>
                                 <div class="icheck-primary">
                                    <input type="checkbox" value="" id="check2">
                                    <label for="check2"></label>
                                 </div>
                              </td>
                              <td>ENG</td>
                              <td>8:00 - 9:00</td>
                              <td>Grade 2</td>
                           </tr>
                        </tbody>
                     </table>
                     <!-- EndTable -->
                     <div class="col-lg-12">
                        <span class="classes">Classes</span>
                        <div class="radio-wrapper-classes mt-3">
                            <div class="radios_classes">
                                <input type="radio" class="form-control" name="classes" id="classes" required>
                                <label for="classes">Grade 1 - A</label>
                            </div>
                            <div class="radios_classes">
                                <input type="radio" class="form-control" name="classes" id="classes1" required>
                                <label for="classes1">Grade 2 - B</label>
                            </div>
                            <div class="radios_classes">
                                <input type="radio" class="form-control" name="classes" id="classes2" required>
                                <label for="classes2">Grade 3 - C</label>
                            </div>
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
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="row students_row">
                  <div class="col-lg-6">
                     <div class="form-group">
                           <div class="students_img">
                              <img src="{{asset ('dist/img/nopp.png')}}">
                           </div>
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="upload_img" id="customFile">
                              <label class="custom-file-label" for="customFile">Upload Image</label>
                           </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <label for="employee_id">Employee ID</label>
                           <input type="text" class="form-control" name="u_employee_id" id="u_employee_id" required placeholder="employee ID">
                        </div>
                        <div class="col-lg-4">
                           <label for="firstname">Firstname</label>
                           <input type="text" class="form-control" name="u_firstname" id="u_firstname" required placeholder="firstname">
                        </div>
                        <div class="col-lg-4">
                           <label for="middlename">Middlename</label>
                           <input type="text" class="form-control" name="u_middlename" id="u_middlename" placeholder="middlename">
                        </div>
                        <div class="col-lg-4">
                           <label for="lastname">Lastname</label>
                           <input type="text" class="form-control" name="u_lastname" id="u_lastname" required placeholder="lastname">
                        </div>
                        <div class="col-lg-12">
                           <label for="address">Address</label>
                           <input type="text" class="form-control" name="u_address" id="u_address" required placeholder="address" autocomplete="address">
                        </div>
                        <div class="col-lg-6">
                           <label for="contact_num">Contact Number</label>
                           <input type="text" class="form-control" name="u_contact_num" id="u_contact_num" required placeholder="Ex.09123456789">
                        </div>
                        <div class="col-lg-6">
                           <label for="t_emailadd">Email Address</label>
                           <input type="text" class="form-control" name="u_t_emailadd" id="u_t_emailadd" required placeholder="email address">
                        </div>
                        <div class="col-lg-6">
                           <label for="date">Date of Birth</label>
                           <input type="date" class="form-control" name="u_date" id="u_date" required placeholder="date">
                        </div>
                        <div class="col-lg-3">
                           <label for="age">Age</label>
                           <input type="text" class="form-control" name="u_age" id="u_age" required>
                        </div>
                        <div class="col-lg-3">
                           <span class="g_label">Gender</span>
                           <div class="radio-wrapper">
                                 <div class="radios">
                                    <input type="radio" class="form-control" name="u_t_g_male" id="u_t_g_male" required>
                                    <label for="u_t_g_male">Male</label>
                                 </div>
                                 <div class="radios">
                                    <input type="radio" class="form-control" name="u_t_g_female" id="u_t_g_female" required>
                                    <label for="u_t_g_female">Female</label>
                                 </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <label for="username">Username</label>
                           <input type="text" class="form-control" name="u_username" id="u_username" required placeholder="username">
                        </div>
                        <div class="col-lg-6">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" name="u_password" id="u_password" required placeholder="password">
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <!-- TableArea -->
                     <table class="table table-bordered table-striped mt-2">
                        <thead>
                           <tr class="text-center">
                              <th>
                                 <div class="icheck-primary">
                                    <input type="checkbox" value="" id="u_check1">
                                    <label for="u_check1"></label>
                                 </div>
                              </th>
                              <th>Subject</th>
                              <th>Schedule</th>
                              <th>Grade Level</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="text-center">
                              <td>
                                 <div class="icheck-primary">
                                    <input type="checkbox" value="" id="u_check2">
                                    <label for="u_check2"></label>
                                 </div>
                              </td>
                              <td>ENG</td>
                              <td>8:00 - 9:00</td>
                              <td>Grade 2</td>
                           </tr>
                        </tbody>
                     </table>
                     <!-- EndTable -->
                     <div class="col-lg-12">
                        <span class="classes">Classes</span>
                        <div class="radio-wrapper-classes mt-3">
                            <div class="radios_classes">
                                <input type="radio" class="form-control" name="u_classes" id="u_classes" required>
                                <label for="u_classes">Grade 1 - A</label>
                            </div>
                            <div class="radios_classes">
                                <input type="radio" class="form-control" name="u_classes" id="u_classes1" required>
                                <label for="u_classes1">Grade 2 - B</label>
                            </div>
                            <div class="radios_classes">
                                <input type="radio" class="form-control" name="u_classes" id="u_classes2" required>
                                <label for="u_classes2">Grade 3 - C</label>
                            </div>
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
        document.querySelectorAll('.tea').forEach(function(element) {
            element.classList.add('activated');
        });
    });
</script>
@endsection