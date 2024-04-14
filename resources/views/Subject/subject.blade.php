@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addSubject">Add New Subject</button>
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
                        <th>Subject</th>
                        <th>Subject Code</th>
                        <th>Grade Level</th>
                        <th>Schedule</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @php
                      $counter = 1;
                  @endphp
                  @if (count($subjects) > 0)
                     @foreach ($subjects as $subject)
                        <tr class="text-center">
                              <td>{{ $counter }}</td>
                              <td>{{ $subject['subject_name'] }}</td>
                              <td>{{ $subject['subject_code'] }}</td>
                              <td>{{ $subject['grade_level_id'] }}</td>
                              <td>{{ $subject['schedule_time'] }}</td>
                              <td class="text-center">
                              <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#updateGrade">
                                    <i class="fas fa-pen"></i>
                                    update
                              </button>
                                 <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-id="" data-target="#deleteGrade" onclick="edit('{{ $subject['id'] }}')">
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
        </div>
    </section>
</div>


<!-- Modals/Dialogs -->


<!-- Add Dialog -->
<div class="modal fade" id="addSubject" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Add New Subject</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{ route('subject_store') }}" class="formPost">
            <div class="modal-body">
               <div class="col-lg-12">
                  <label for="subject_name">Subject Name</label>
                  <input type="text" class="form-control" name="subject_name" id="subject_name" required placeholder="subject">
               </div>
               <div class="col-lg-12">
                  <label for="subject_code">Subject Code</label>
                  <input type="text" class="form-control" name="subject_code" id="subject_code" required placeholder="subject code">
               </div>
               <div class="col-lg-12">
                  <label for="grade">Grade</label>
                  <select class="form-control" name="grade" id="grade" required>
                     <option value="" disabled selected>Select Grade</option>
                     @foreach ($grades as $grade)
                        <option value="{{ $grade['id'] }}">{{ $grade['grade'] }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-lg-12">
                  <label>Schedule</label>
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="time" class="form-control" name="schedule_time" id="schedule_time" required>
                     </div>
                     <div class="col-lg-6">
                        <input type="time" class="form-control" name="schedule_time_end" id="schedule_time_end" required>
                     </div>
                  </div>
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
<div class="modal fade" id="updateGrade" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Update Grade</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="col-lg-12">
                  <label>Subject Name</label>
                  <input type="text" class="form-control" name="u_subject_name" id="u_subject_name" required placeholder="subject">
               </div>
               <div class="col-lg-12">
                  <label>Subject Code</label>
                  <input type="text" class="form-control" name="u_subject_code" id="u_subject_code" required placeholder="subject code">
               </div>
               <div class="col-lg-12">
                  <label>Grade</label>
                  <select class="form-control" name="u_grade" id="u_grade" required>
                     <option value="" disabled selected>Select Grade</option>
                     <option value="Grade 1">Grade 1</option>
                     <option value="Grade 2">Grade 2</option>
                     <option value="Grade 3">Grade 3</option>
                     <!-- Add more options as needed -->
                  </select>
               </div>
               <div class="col-lg-12">
                  <label>Schedule</label>
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="time" class="form-control" name="u_schedule_am" id="u_schedule_am" required>
                     </div>
                     <div class="col-lg-6">
                        <input type="time" class="form-control" name="u_schedule_time_end" id="u_schedule_time_end" required>
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