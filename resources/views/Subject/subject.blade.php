@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="school_year">
                <div class="sy_data">
                    School Year 2023 - 2024
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
                    <tr>
                        <td>Grade 1</td>
                        <td>
                            <select name="sel_sec" id="sel_sec" class="form-control">
                                <option value="">Ruby</option>
                                <option value="">Rose</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-warning btn-md" data-toggle="modal" data-target="#viewSubject">
                                View Subject
                            </button>
                            <button class="btn btn-success btn-md" data-toggle="modal" data-target="#assignSubject">
                                Assign Subject
                            </button>
                        </td>
                    </tr>
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div>Subject</div>
                    <input type="text" class="form-control" name="subject" id="subject">
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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="div_gsbtn">
                    <div class="grade_sec_label">
                        <div class="grade_label">
                            Grade: 1
                        </div>
                        <div class="sec_label">
                            Section: Ruby
                        </div>
                    </div>
                    <div class="up_btn">
                        <!-- Save changes button will shown only when you try to update some data. -->
                        <button type="submit" class="btn btn-success btn-md">
                            Save Changes
                        </button>
                        <button class="btn btn-primary btn-md">
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
                    <tbody>
                        <tr>
                            <td width="150">
                                <input type="text" class="form-control" name="sub_data" id="sub_data" readonly
                                    placeholder="English">
                            </td>
                            <td width="150">
                                <input type="text" class="form-control" name="subcode_data" id="subcode_data" readonly
                                    placeholder="123456">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="subcode_data" id="subcode_data" readonly
                                    placeholder="Understanding the self">
                            </td>
                            <td width="150">
                                <input type="text" class="form-control" name="subcode_data" id="subcode_data" readonly
                                    placeholder="10:00am - 11:00am">
                            </td>
                        </tr>
                    </tbody>
                </table>
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
</script>
@endsection