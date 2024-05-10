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
                        @foreach ($grade_levels as $grade_level)
                            <tr class="text-center">
                                <td> <a href="#" name="sel_grade_lvl" id="sel_grade_lvl" class="sel_grade_lvl"
                                        data-toggle="modal" data-target="#popStudents"
                                        data-id="{{ $grade_level['id'] }}"> Grade {{ $grade_level['grade'] }}</a> </td>
                                <td class="text-center">
                                    <select class="form-control sel_cus_width sel_section" name="sel_section"
                                        id="sel_section">
                                        @if (array_key_exists($grade_level['id'], $sections))
                                            @foreach ($sections[$grade_level['id']] as $key => $section)
                                                <option value="{{ $key }}">{{ $section }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                            </tr>
                        @endforeach
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
                        <tbody id="pop_student">
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
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>
                                    ID number
                                </td>
                                <td>
                                    <input type="text" class="form-control students_id_no" name="students_id_no"
                                        id="students_id_no" placeholder="012" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    LRN
                                </td>
                                <td>
                                    <input type="text" class="form-control students_lrn" name="students_lrn"
                                        id="students_lrn" placeholder="11865670032" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address
                                </td>
                                <td>
                                    <input type="text" class="form-control students_address" name="students_address"
                                        id="students_address" placeholder="Dagohoy" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Gender
                                </td>
                                <td>
                                    <input type="text" class="form-control students_gender" name="students_gender"
                                        id="students_gender" placeholder="Female" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Date Created
                                </td>
                                <td>
                                    <input type="text" class="form-control students_date" name="students_date"
                                        id="students_date" placeholder="August 24,2024" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Grade
                                </td>
                                <td>
                                    <input type="text" class="form-control students_grade" name="students_grade"
                                        id="students_grade" placeholder="2" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Section
                                </td>
                                <td>
                                    <input type="text" class="form-control students_section" name="students_section"
                                        id="students_section" placeholder="B" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- ParentsInformationArea -->
                    <div class="students_parents_info mt-3">Students Parents/Guardian Basic Information</div>
                    <div class="row students_parents_row">
                        <div class="col-lg-4">
                            <div>Firstname</div>
                            <input type="text" class="form-control mb-2 p_first_name" name="p_first_name"
                                id="p_first_name" required readonly placeholder="firstname">
                        </div>
                        <div class="col-lg-4">
                            <div>Middlename</div>
                            <input type="text" class="form-control mb-2 p_middle_name" name="p_middle_name"
                                id="p_middle_name" readonly placeholder="middlename">
                        </div>
                        <div class="col-lg-4">
                            <div>Lastname</div>
                            <input type="text" class="form-control mb-2 p_last_name" name="p_last_name"
                                id="p_last_name" required readonly placeholder="lastname">
                        </div>
                        <div class="col-lg-6">
                            <div>Contact Number</div>
                            <input type="number" class="form-control mb-2 contact_number" name="contact_number"
                                id="contact_number" readonly placeholder="Ex.09123456789">
                        </div>
                        <div class="col-lg-6">
                            <div>Email Address <span class="optional">(optional)</span></div>
                            <input type="text" class="form-control mb-2 email_add" name="email_add" id="email_add"
                                readonly placeholder="email address">
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
                <form action="{{ route('enrollmentprocess_students_update') }}" class="formPost">
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="2" class="students_fullname">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td>
                                        ID number
                                    </td>
                                    <td>
                                        <input type="text" class="form-control students_id_no" name="students_id_no" id="students_id_no"
                                            disabled placeholder="000000">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        LRN
                                    </td>
                                    <td>
                                        <input type="text" class="form-control students_lrn" name="students_lrn" id="students_lrn"
                                            disabled placeholder="00000000000">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Address
                                    </td>
                                    <td>
                                        <input type="text" class="form-control students_address" name="students_address"
                                            id="students_address" disabled placeholder="address">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Gender
                                    </td>
                                    <td>
                                        <input type="text" class="form-control students_gender" name="students_gender"
                                            id="students_gender" disabled placeholder="gender">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Date Created
                                    </td>
                                    <td>
                                        <input type="text" class="form-control students_date" name="students_date" id="students_date"
                                            disabled placeholder="00/00/00">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Grade
                                    </td>
                                    <td>
                                        <input type="text" class="form-control students_grade" name="students_grade" id="students_grade"
                                            disabled placeholder="grade">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Section
                                    </td>
                                    <td>
                                        <input type="text" class="form-control students_section" name="students_section"
                                            id="students_section" disabled placeholder="section">
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- ParentsInformationArea -->
                        <div class="students_parents_info mt-3">Students Parents/Guardian Basic Information</div>
                        <div class="row students_parents_row">
                            <input type="text" class="form-control mb-2 id" name="id" id="id" readonly hidden>
                            <div class="col-lg-4">
                                <div>Firstname</div>
                                <input type="text" class="form-control mb-2 p_first_name" name="p_first_name" id="p_first_name"
                                    placeholder="firstname">
                            </div>
                            <div class="col-lg-4">
                                <div>Middlename</div>
                                <input type="text" class="form-control mb-2 p_middle_name" name="p_middle_name" id="p_middle_name"
                                    placeholder="middlename">
                            </div>
                            <div class="col-lg-4">
                                <div>Lastname</div>
                                <input type="text" class="form-control mb-2 p_last_name" name="p_last_name" id="p_last_name"
                                    placeholder="lastname">
                            </div>
                            <div class="col-lg-6">
                                <div>Contact Number</div>
                                <input type="number" class="form-control mb-2 contact_number" name="contact_number" id="contact_number"
                                    placeholder="Ex.09123456789">
                            </div>
                            <div class="col-lg-6">
                                <div>Email Address <span class="optional"></span></div>
                                <input type="text" class="form-control mb-2 email_add" name="email_add" id="email_add" required
                                    placeholder="email address">
                            </div>
                        </div>

                        <div class="students_parents_info mt-3">Requirements</div>
                        <div class="students_parents_row mb-2">
                            <div class="checkboxes">
                                <div class="icheck-primary">
                                    <input type="checkbox" value="1" class="nso form-control" name="nso_check"
                                        id="check3">
                                    <label for="check3">NSO</label>
                                </div>
                                <div class="icheck-primary">
                                    <input type="checkbox" value="1" class="enroll form-control" name="enroll_check"
                                        id="check4">
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
                </form>
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

        $(".sel_grade_lvl").on("click", function(e) {
            const id = $(this).data("id");
            const section = $(this).closest('tr').find('.sel_section').val();
            const pathTemplate =
                "{{ route('get_students', ['section' => ':section', 'id' => ':id']) }}";
            const path = pathTemplate.replace(":section", section).replace(":id", id);

            $('#pop_student').empty();

            $.ajax({
                type: "GET",
                cache: false,
                url: path,
                data: {
                    section: section,
                    id: id
                },
                success: function(data) {
                    data['message'].forEach(element => {
                        const newRow = `
                                    <tr class="text-center">
                                        <td>
                                            ${element.first_name} ${element.middle_name} ${element.last_name}
                                        </td>
                                        <td>
                                            <button class="btn btn-outline-warning btn-md text-dark edit_student" data-toggle="modal"
                                                data-target="#viewS" data-id="${element.id}">
                                                <i class="fas fa-eye"></i>
                                                view
                                            </button>
                                            <button class="btn btn-outline-primary btn-md edit_student" data-toggle="modal"
                                                data-target="#updateS" data-id="${element.id}">
                                                <i class="fas fa-pen"></i>
                                                update
                                            </button>
                                        </td>
                                    </tr>
                                `;
                        $('#pop_student').append(newRow);
                    });
                },
            });
        })

        $(document).on("click", ".edit_student", function(e) {
            e.preventDefault();
            const id = $(this).data("id");
            const pathTemplate = "{{ route('get_student', ['id' => ':id']) }}";
            const path = pathTemplate.replace(":id", id);
            
            $('.nso').prop('checked', false);
            $('.enroll').prop('checked', false);

            $.ajax({
                type: "GET",
                cache: false,
                url: path,
                data: {
                    id: id,
                },
                success: function(data) {

                    const date = new Date(data['message']['created_at']);

                    // Convert the date to a more readable format
                    const formattedDate = date.toLocaleDateString("en-US", {
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    });

                    $('.id').val(data['message']['id']);
                    $('.students_id_no').val(data['message']['id_no']);
                    $('.students_lrn').val(data['message']['lrn']);
                    $('.students_address').val(data['message']['address']);
                    $('.students_gender').val(data['message']['gender'] == 2 ? 'Female' : 'Male');
                    $('.students_date').val(formattedDate);
                    $('.students_grade').val(data['message']['grade']);
                    $('.students_section').val(data['message']['section_name']);
                    $('.p_first_name').val(data['message']['p_first_name']);
                    $('.p_middle_name').val(data['message']['p_middle_name']);
                    $('.p_last_name').val(data['message']['p_last_name']);
                    $('.contact_number').val(data['message']['contact_number']);
                    $('.email_add').val(data['message']['email_add']);
                    $('.students_fullname').text(data['message']['first_name'] + " " + data['message']['middle_name'] + " " + data['message']['last_name']);
                    if (data['message']['nso'] == 1) {
                        $('.nso').prop('checked', true);
                    }
                    if (data['message']['e_form'] == 1) {
                        $('.enroll').prop('checked', true);
                    }
                },
            });
        })
    </script>
@endsection
