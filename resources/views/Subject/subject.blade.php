@extends('layout.app')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="school_year">
                    <div class="sy_data">
                        School Year <span id="prev_year"></span> - <span id="cur_year"></span>
                    </div>
                </div>
                <table id="example1" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Grade level</th>
                            <th>Section</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($sectionsByGrade as $grade => $sections)
                            <tr>
                                <td>Grade {{ $grade }}</td>
                                <form action="{{ route('class_grade_section') }}" class="update">
                                    <td>
                                        <select name="sections_grade" class="form-control">
                                            @foreach ($sections as $section)
                                                <option value="{{ $section }}">{{ $section }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="grade"
                                            value="{{ $grade }}" readonly hidden>
                                        <button type="submit" class="btn btn-warning btn-md" data-toggle="modal"
                                            data-target="#viewSubject">
                                            View Subject
                                        </button>
                                        <button type="submit" class="btn btn-success btn-md" data-toggle="modal"
                                            data-target="#assignSubject">
                                            Assign Subject
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>


    <!-- Modals/Dialogs -->


    <!-- Add Dialog -->
    <div class="modal fade" id="assignSubject" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Assign Subject</h4>
                    <button type="button" class="close_view bg-gradient-secondary border-0" data-dismiss="modal"
                        aria-label="Close">
                        <span class="text-dark font-weight-bold" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('subject_store') }}" class="formPost">
                    <div class="modal-body">
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                        <div>Subject</div>
                        <input type="text" class="form-control" name="subject_name" id="subject_name">
                        <div>Subject Code</div>
                        <input type="text" class="form-control" name="subject_code" id="subject_code">
                        <div>Description</div>
                        <input type="text" class="form-control" name="description" id="description">
                        <div>Schedule</div>
                        <input type="text" class="form-control" name="schedule" id="schedule">
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
    <!-- End of Add Dialog -->

    <!-- View Dialog -->
    <div class="modal fade" id="viewSubject" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">View Subject</h4>
                    <button type="button" class="close_view bg-gradient-secondary border-0" data-dismiss="modal"
                        aria-label="Close">
                        <span class="text-dark font-weight-bold" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="div_gsbtn">
                        <div class="grade_sec_label">
                            <div class="grade_label">
                                Grade: <span id="gl_value"></span>
                            </div>
                            <div class="sec_label">
                                Section: <span id="sl_value"></span>
                            </div>
                        </div>
                        <form id="myForm">
                            <div class="up_btn">
                                <!-- Save changes button will shown only when you try to update some data. -->
                                <button type="submit" class="btn btn-success btn-md" id="save_view_subjects" hidden>
                                    Save Changes
                                </button>
                                <button type="button" class="btn btn-primary btn-md" id="update_view_subjects">
                                    Update
                                </button>
                            </div>
                    </div>
                    <table id="example2" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Subject Code</th>
                                <th>Description</th>
                                <th>Schedule</th>
                            </tr>
                        </thead>
                        <tbody class="view_subject_tbody">
                        </tbody>
                    </table>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of View Dialog -->


    <!-- Delete Dialog -->
    <div class="modal fade" id="deleteGrade" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('subject_destroy') }}" class="formPost">
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
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.sub').forEach(function(element) {
                element.classList.add('activated');
            });
        });

        const currentYear = new Date().getFullYear();
        const previousYear = currentYear - 1;

        $('#cur_year').text(currentYear);
        $('#prev_year').text(previousYear);

        $("#update_view_subjects").on("click", function(e) {
            e.preventDefault();
            $(this).prop('hidden', true);
            $('#save_view_subjects').prop('hidden', false);
            // $('.sub_data').prop('disabled', false);
            $('.view_subject:visible').find('.sub_data').prop('disabled', false);
        });

        let counter = 1;

        $(".update").on("submit", function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                cache: false,
                url: $(this).attr("action"),
                data: $(this).serialize(),
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(data) {
                    $('.id').val(data['id']);
                    $('#gl_value').text(data['grade_level']);
                    $('#sl_value').text(data['section']);
                    $('#save_view_subjects').prop('hidden', true);
                    $('#update_view_subjects').prop('hidden', false);


                    $.ajax({
                        type: "POST",
                        cache: false,
                        url: "{{ route('subject_grade_section') }}",
                        data: {
                            grade_level: data['grade_level'],
                            section: data['section']
                        },
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        success: function(data) {

                            // console.log(data);

                            let tbody = $(".view_subject_tbody");
                            tbody.empty();

                            data.forEach(function(subject) {

                                let htmlContent = '<tr class="view_subject ' +
                                    subject.classes_id +
                                    '"> \
                                                                    <td width="150"> \
                                                                        <input type="text" class="form-control" name="id" id="subject_id_' +
                                    counter + '" value="' +
                                    subject
                                    .id +
                                    '" readonly hidden> \
                                                                        <input type="text" class="form-control sub_data" name="sub_data_name[]" id="sub_data_name_' +
                                    counter + '" value="' +
                                    subject.subject_name + '" placeholder="' +
                                    subject.subject_name +
                                    '" disabled> \
                                                                    </td> \
                                                                    <td width="150"> \
                                                                        <input type="text" class="form-control sub_data" name="sub_data_code[]" id="sub_data_code_' +
                                    counter + '" value="' +
                                    subject.subject_code + '" placeholder="' +
                                    subject.subject_code +
                                    '" disabled> \
                                                                    </td> \
                                                                    <td> \
                                                                        <input type="text" class="form-control sub_data" name="sub_data_decs[]" id="sub_data_decs_' +
                                    counter + '" value="' +
                                    subject.description + '" placeholder="' +
                                    subject.description +
                                    '" disabled> \
                                                                    </td> \
                                                                    <td width="150"> \
                                                                        <input type="text" class="form-control sub_data" name="sub_data_sched[]" id="sub_data_sched_' +
                                    counter + '" value="' +
                                    subject.schedule + '" placeholder="' + subject
                                    .schedule + '" disabled> \
                                                                    </td> \
                                                                </tr>';

                                tbody.append(htmlContent);
                                counter++;
                            });

                        },
                    });


                },
            });
        });


        $("#myForm").on("submit", function(e) {
            e.preventDefault();

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 1500,
            });

            let classes_subjects = [];
            let i = 1;
            while (i < counter) {
                classes_subjects.push({
                    'id': $(`#subject_id_${i}`).val(),
                    'subject_name': $(`#sub_data_name_${i}`).val(),
                    'subject_code': $(`#sub_data_code_${i}`).val(),
                    'description': $(`#sub_data_decs_${i}`).val(),
                    'schedule': $(`#sub_data_sched_${i}`).val(),
                });
                i++;
            }
            const formData = {
                classes_subjects: classes_subjects,
            };

            $.ajax({
                type: "POST",
                cache: false,
                url: "{{ route('subject_update') }}",
                data: formData,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function(data) {
                    switch (data["response"]) {
                        case 1:
                            Toast.fire({
                                icon: "success",
                                title: '<p class="text-center pt-2 text-bold text-black">' +
                                    data["message"] +
                                    "</p>",
                            });

                            setTimeout(function() {
                                window.location.href = data["path"];
                            }, 1500);

                            break;
                        default:
                            Toast.fire({
                                icon: "error",
                                title: '<p class="text-center pt-2">' +
                                    data["message"] +
                                    "</p>",
                            });
                            break;
                    }
                },
            });
        });
    </script>
@endsection
