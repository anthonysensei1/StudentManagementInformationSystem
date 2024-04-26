@extends('layout.app')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid pt-2">
                <button class="btn btn-outline-success btn-md mb-2" data-toggle="modal" data-target="#addClass">Add New
                    Class</button>

                @if (auth()->user()->type == 1)
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
                @endif

                @if (auth()->user()->type == 1)
                    <!-- TableArea -->
                    <table id="example1" class="table table-bordered table-striped mt-2">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @if (count($classes) > 0)
                                @foreach ($classes as $class)
                                    <tr class="text-center">
                                        <td>{{ $counter }}</td>
                                        <td>{{ $class['grade'] }} {{ $class['section_name'] }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-outline-primary btn-md" data-toggle="modal"
                                                data-target="#updateClass"
                                                onclick="edit('{{ $class['id'] }}', { u_c_grade: '{{ $class['grade_level'] }}', u_c_section: '{{ $class['section'] }}', section_id: '{{ $class['id'] }}' })">
                                                <i class="fas fa-pen"></i>
                                                update
                                            </button>
                                            <button class="btn btn-outline-danger btn-md" data-toggle="modal"
                                                data-target="#deleteSection" onclick="edit('{{ $class['id'] }}')">
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
                                    <td colspan="6" class="text-center">No data is displayed!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <!-- EndTable -->
                @elseif (auth()->user()->type == 2)
                    <!-- This table will be shown only if the status of the user logged in is TEACHER -->
                    <!-- TableArea -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>Class</th>
                                <th>Subject</th>
                                <th>Schedule</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @if (count($teachers_subject_classes) > 0)
                                @foreach ($teachers_subject_classes as $teachers_subject_class)
                                    <tr class="text-center">
                                        <td>{{ $counter }}</td>
                                        <td><a href="#" class="student_name view" data-toggle="modal"
                                                data-id="{{ $teachers_subject_class['current_grade_id'] }}"
                                                data-route-template="{{ route('view_class', ['id' => ':id']) }}"
                                                data-subject-name="{{ $teachers_subject_class['subject_name'] }}"
                                                data-subject-name-id="{{ $teachers_subject_class['subject_name_id'] }}"
                                                data-target="#studentListModal">{{ $teachers_subject_class['current_grade'] }}</a>
                                        </td>
                                        <td>{{ $teachers_subject_class['subject_name'] }}</td>
                                        <td>{{ $teachers_subject_class['schedule_time'] }} -
                                            {{ $teachers_subject_class['schedule_time_end'] }}</td>
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
                @endif

            </div>
        </section>
    </div>


    <!-- Modals/Dialogs -->


    <!-- Show Students List -->
    <div class="modal fade" id="studentListModal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Students List</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" class="formPost">
                    <div class="modal-body">
                        <!-- TableArea -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>ID No.</th>
                                    <th>LRN</th>
                                    <th>Students</th>
                                </tr>
                            </thead>
                            <tbody id="student_list">
                            </tbody>
                        </table>
                        <!-- EndTable -->
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of Show Students Grade -->




    <!-- Show Students Grade -->
    <div class="modal fade" id="studentGradeModal" data-backdrop="static">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Students Grade</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- TableArea -->
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>ID No. :</td>
                                        <td> <a href="#" id="student_grade_id_no">1001</a> </td>
                                    </tr>
                                    <tr>
                                        <td>LRN :</td>
                                        <td id="student_grade_lrn">10003234</td>
                                    </tr>
                                    <tr>
                                        <td>Name :</td>
                                        <td id="student_grade_name">Gumatay, Jemima Najos</td>
                                    </tr>
                                    <tr>
                                        <td>Grade Level :</td>
                                        <td id="student_grade_level">Grade 2</td>
                                    </tr>
                                    <tr>
                                        <td>Section :</td>
                                        <td id="student_grade_section">A</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- EndTable -->
                            <div class="modal-footer">
                                <span id="current_year"></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="sub_label">
                                Subject
                            </div>
                            <form action="{{ route('class_store_grade') }}" class="formPost">
                                <input type="text" class="form-control" name="student_id" class="student_id"
                                    id="student_id" readonly hidden>
                                <input type="text" class="form-control" name="sub_in" class="sub_in" id="sub_in"
                                    disabled>
                                <input type="text" class="form-control" name="sub_in_id" class="sub_in_id"
                                    id="sub_in_id" readonly hidden>
                                <div class="ag_label">
                                    Add Grade
                                </div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>1st Quarter</td>
                                            <td> <input type="number" class="form-control" name="quarter_1"
                                                    id="quarter_1" placeholder="91" min="50" max="100"> </td>
                                        </tr>
                                        <tr>
                                            <td>2nd Quarter</td>
                                            <td> <input type="number" class="form-control" name="quarter_2"
                                                    id="quarter_2" placeholder="85" min="50" max="100"> </td>
                                        </tr>
                                        <tr>
                                            <td>3rd Quarter</td>
                                            <td> <input type="number" class="form-control" name="quarter_3"
                                                    id="quarter_3" placeholder="89" min="50" max="100"> </td>
                                        </tr>
                                        <tr>
                                            <td>4th Quarter</td>
                                            <td> <input type="number" class="form-control" name="quarter_4"
                                                    id="quarter_4" placeholder="87" min="50" max="100"> </td>
                                        </tr>
                                        <tr>
                                            <td>Final Rating</td>
                                            <td class="final_grade_result" id="final_rating"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- EndTable -->
                                <div class="save_grade">
                                    <button type="submit" class="btn btn-outline-success btn-md">
                                        <i class="fas fa-check"></i>
                                        Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End of Show Students Grade -->



    <!-- Add Dialog -->
    <div class="modal fade" id="addClass" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Add New Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('class_store') }}" class="formPost">
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <label for="c_grade">Grade</label>
                            <select class="form-control c_grade" name="c_grade" id="c_grade" required>
                                <option value="" disabled selected>Select Grade</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade['id'] }}">{{ $grade['grade'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 c_section_div" hidden>
                            <label for="c_section">Section</label>
                            <select class="form-control c_section" name="c_section" id="c_section" required>
                                <option value="" disabled selected>Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section['id'] }}"
                                        data-grade-level="{{ $section['grade_level_id'] }}">{{ $section['section'] }}
                                    </option>
                                @endforeach
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
    <!-- End of Add Dialog -->


    <!-- Update Dialog -->
    <div class="modal fade" id="updateClass" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Update Class</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('class_update') }}" class="formPost">
                    <div class="modal-body">
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                        <div class="col-lg-12">
                            <label for="u_c_grade">Grade</label>
                            <select class="form-control c_grade" name="c_grade" id="u_c_grade" required>
                                <option value="" disabled selected>Select Grade</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade['id'] }}">{{ $grade['grade'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-12 u_c_section_div" hidden>
                            <label for="u_c_section">Section</label>
                            <select class="form-control c_section" name="c_section" id="u_c_section" required>
                                <option value="" disabled selected>Select Section</option>
                                @foreach ($sections as $section)
                                    <option value="{{ $section['id'] }}"
                                        data-grade-level="{{ $section['grade_level_id'] }}">{{ $section['section'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success btn-md">
                            <i class="fas fa-check"></i>
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
    <div class="modal fade" id="deleteSection" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-secondary">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('class_destroy') }}" class="formPost">
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
            document.querySelectorAll('.cla').forEach(function(element) {
                element.classList.add('activated');
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all cells with class "editable-cell"
            var cells = document.querySelectorAll('.editable-cell');

            // Iterate over each cell and replace its content with an input element
            cells.forEach(function(cell) {
                var value = cell.textContent.trim();
                cell.innerHTML = '<input type="text" class="form-control" value="' + value + '">';
            });

            // Add event listener to each input element to update the table cell value
            document.querySelectorAll('#editableTable input').forEach(function(input) {
                input.addEventListener('change', function() {
                    var value = this.value;
                    this.parentNode.textContent = value;
                    calculateFinalGrade(); // Update final grade when any cell changes
                });
            });

            // Function to calculate and update the final grade
            function calculateFinalGrade() {
                var quarters = document.querySelectorAll('.editable-cell:not(.final_grade_result)');
                var total = 0;
                quarters.forEach(function(quarter) {
                    total += parseInt(quarter.textContent);
                });
                var finalGradeCell = document.querySelector('.final_grade_result');
                finalGradeCell.textContent = (total / quarters.length).toFixed(2);
            }

            const currentYear = new Date().getFullYear();
            const lastYear = new Date().getFullYear() - 1;

            $('#current_year').text(`School Year ${lastYear} - ${currentYear}`);

        });

        let subject_name = '';
        let subject_name_id = '';

        $(".view").on("click", function(e) {
            e.preventDefault();
            const id = $(this).data("id");
            let routeTemplate = $(this).data("route-template");
            const url = routeTemplate.replace(":id", id);
            $('#student_list').empty();

            subject_name = $(this).data("subject-name");
            subject_name_id = $(this).data("subject-name-id");

            $.ajax({
                type: "GET",
                cache: false,
                url: url,
                data: {
                    id: id,
                },
                success: function(data) {
                    let counter = 1;
                    data['message'].forEach(element => {
                        const newRow = `
                            <tr class="text-center">
                                <td>${counter}</td>
                                <td><a href="#" class="student_name edit_student" data-toggle="modal" data-id="${element.id}" data-target="#studentGradeModal">${element.id_no}</a></td>
                                <td>${element.lrn}</td>
                                <td>${element.first_name} ${element.middle_name} ${element.last_name}</td>
                            </tr>
                        `;
                        $('#student_list').append(newRow);
                        counter++;
                    });
                },
            });
        });


        $(document).on("click", ".edit_student", function(e) {
            e.preventDefault();
            const id = $(this).data("id");
            const subject_id = subject_name_id;
            const pathTemplate =
                "{{ route('view_student_grade', ['id' => ':id', 'subject_id' => ':subject_id']) }}";
            const path = pathTemplate.replace(":id", id).replace(":subject_id", subject_id);

            $.ajax({
                type: "GET",
                cache: false,
                url: path,
                data: {
                    id: id,
                    subject_id: subject_id
                },
                success: function(data) {
                    $('#student_grade_id_no').text(data['message']['id_no']);
                    $('#student_grade_lrn').text(data['message']['lrn']);
                    $('#student_grade_name').text(data['message']['first_name'] + " " + data['message'][
                        'middle_name'
                    ] + " " + data['message']['last_name']);
                    $('#student_grade_level').text(data['message']['grade']);
                    $('#student_grade_section').text(data['message']['section_name']);
                    $('#sub_in').val(subject_name);
                    $('#sub_in_id').val(subject_name_id);
                    $('#student_id').val(data['message']['id']);
                    $('#quarter_1').val(data['message']['quarter_1']);
                    $('#quarter_2').val(data['message']['quarter_2']);
                    $('#quarter_3').val(data['message']['quarter_3']);
                    $('#quarter_4').val(data['message']['quarter_4']);
                    $('#final_rating').text(data['message']['final_rating']);
                },
            });
        });
    </script>

@endsection
