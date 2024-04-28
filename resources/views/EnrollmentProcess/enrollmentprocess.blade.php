@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="enrollment_admission pt-3">
                Enrollment / Admission
            </div>
            <!-- TableArea -->
            <table id="example1" class="table table-bordered table-striped mt-2">
                <thead>
                    <tr class="text-center">
                        <th>Grade Level</th>
                        <th>Section</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td> <a href="#" name="sel_grade_lvl" id="sel_grade_lvl" class="sel_grade_lvl"
                                data-toggle="modal" data-target="#popStudents">Grade 1</a> </td>
                        <td class="text-center">
                            <select class="form-control sel_cus_width" name="sel_section" id="sel_section" width="50">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- EndTable -->
        </div>
    </section>
</div>


<!-- PopStudent Dialog -->
<div class="modal fade" id="popStudents" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th colspan="2" class="Students">Students</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>
                                Nikka Jeminos
                            </td>
                            <td>
                                <button class="btn btn-outline-warning btn-md text-dark" data-toggle="modal" data-target="#viewS">
                                    <i class="fas fa-eye"></i>
                                    view
                                </button>
                                <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#updateS">
                                    <i class="fas fa-pen"></i>
                                    update
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of PopStudent Dialog -->




<!-- PopStudent Dialog -->
<div class="modal fade" id="viewS" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th colspan="2" class="students_fullname">
                                Nikka Jeminos
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>
                                ID number
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_id_no" id="students_id_no"
                                    placeholder="012" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                LRN
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_lrn" id="students_lrn"
                                    placeholder="11865670032" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_address" id="students_address"
                                    placeholder="Dagohoy" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gender
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_gender" id="students_gender"
                                    placeholder="Female" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Created
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_date" id="students_date"
                                    placeholder="August 24,2024" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Grade
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_grade" id="students_grade"
                                    placeholder="2" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Section
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_section" id="students_section"
                                    placeholder="B" readonly>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- ParentsInformationArea -->
                <div class="students_parents_info mt-3">Students Parents/Guardian Basic Information</div>
                <div class="row students_parents_row">
                    <div class="col-lg-4">
                        <div>Firstname</div>
                        <input type="text" class="form-control mb-2" name="p_first_name" id="p_first_name" required readonly placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <div>Middlename</div>
                        <input type="text" class="form-control mb-2" name="p_middle_name" id="p_middle_name" readonly placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <div>Lastname</div>
                        <input type="text" class="form-control mb-2" name="p_last_name" id="p_last_name" required readonly placeholder="lastname">
                    </div>
                    <div class="col-lg-6">
                        <div>Contact Number</div>
                        <input type="number" class="form-control mb-2" name="contact_number" id="contact_number" readonly placeholder="Ex.09123456789">
                    </div>
                    <div class="col-lg-6">
                        <div>Email Address <span class="optional">(optional)</span></div>
                        <input type="text" class="form-control mb-2" name="email_add" id="email_add" readonly placeholder="email address">
                    </div>
                </div>

                <div class="students_parents_info mt-3">Requirements</div>
                <div class="students_parents_row mb-2">
                    <div class="checkboxes">
                        <div class="icheck-primary">
                            <input type="checkbox" value="" class="nso_enroll" name="check1" id="check1">
                            <label for="check1">NSO</label>
                        </div>
                        <div class="icheck-primary">
                            <input type="checkbox" value="" class="nso_enroll" name="check2" id="check2">
                            <label for="check2">Enrollment Form</label>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of PopStudent Dialog -->




<!-- UpdateStudent Dialog -->
<div class="modal fade" id="updateS" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Update Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th colspan="2" class="students_fullname">
                                Nikka Jeminos
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>
                                ID number
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_id_no" id="students_id_no" placeholder="000000">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                LRN
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_lrn" id="students_lrn" placeholder="00000000000">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Address
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_address" id="students_address" placeholder="address">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Gender
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_gender" id="students_gender" placeholder="gender">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Date Created
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_date" id="students_date" placeholder="00/00/00">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Grade
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_grade" id="students_grade" placeholder="grade">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Section
                            </td>
                            <td>
                                <input type="text" class="form-control" name="students_section" id="students_section" placeholder="section">
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <!-- ParentsInformationArea -->
                <div class="students_parents_info mt-3">Students Parents/Guardian Basic Information</div>
                <div class="row students_parents_row">
                    <div class="col-lg-4">
                        <div>Firstname</div>
                        <input type="text" class="form-control mb-2" name="p_first_name" id="p_first_name" placeholder="firstname">
                    </div>
                    <div class="col-lg-4">
                        <div>Middlename</div>
                        <input type="text" class="form-control mb-2" name="p_middle_name" id="p_middle_name" placeholder="middlename">
                    </div>
                    <div class="col-lg-4">
                        <div>Lastname</div>
                        <input type="text" class="form-control mb-2" name="p_last_name" id="p_last_name" placeholder="lastname">
                    </div>
                    <div class="col-lg-6">
                        <div>Contact Number</div>
                        <input type="number" class="form-control mb-2" name="contact_number" id="contact_number" placeholder="Ex.09123456789">
                    </div>
                    <div class="col-lg-6">
                        <div>Email Address <span class="optional"></span></div>
                        <input type="text" class="form-control mb-2" name="email_add" id="email_add" required placeholder="email address">
                    </div>
                </div>

                <div class="students_parents_info mt-3">Requirements</div>
                <div class="students_parents_row mb-2">
                    <div class="checkboxes">
                        <div class="icheck-primary">
                            <input type="checkbox" value="" class="nso_enroll form-control" name="check3" id="check3">
                            <label for="check3">NSO</label>
                        </div>
                        <div class="icheck-primary">
                            <input type="checkbox" value="" class="nso_enroll form-control" name="check4" id="check4">
                            <label for="check4">Enrollment Form</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-md">
                    <i class="fas fa-pen"></i>
                    save changes
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End of UpdateStudent Dialog -->



<!-- Modals/Dialogs -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.enrollment_process').forEach(function(element) {
        element.classList.add('activated');
    });
});
</script>

@endsection