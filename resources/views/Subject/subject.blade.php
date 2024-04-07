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
            <table class="table table-bordered table-striped mt-2">
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
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                        <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#updateGrade">
                                <i class="fas fa-pen"></i>
                                update
                        </button>
                        <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-id="" data-target="#deleteGrade">
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


<!-- Modals/Dialogs -->


<!-- Add Dialog -->
<div class="modal fade" id="addSubject" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Add New Subject</h4>
         </div>
         <form action="#" class="formPost">
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
                     <option value="Grade 1">Grade 1</option>
                     <option value="Grade 2">Grade 2</option>
                     <option value="Grade 3">Grade 3</option>
                  </select>
               </div>
               <div class="col-lg-12">
                  <label for="schedule">Schedule</label>
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="schedule_am" id="schedule_am" required placeholder="00:00 AM">
                     </div>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="schedule_pm" id="schedule_pm" required placeholder="00:00 PM">
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
         </div>
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="col-lg-12">
                  <label for="u_subject_name">Subject Name</label>
                  <input type="text" class="form-control" name="u_subject_name" id="u_subject_name" required placeholder="subject">
               </div>
               <div class="col-lg-12">
                  <label for="u_subject_code">Subject Code</label>
                  <input type="text" class="form-control" name="u_subject_code" id="u_subject_code" required placeholder="subject code">
               </div>
               <div class="col-lg-12">
                  <label for="u_grade">Grade</label>
                  <select class="form-control" name="u_grade" id="u_grade" required>
                     <option value="" disabled selected>Select Grade</option>
                     <option value="Grade 1">Grade 1</option>
                     <option value="Grade 2">Grade 2</option>
                     <option value="Grade 3">Grade 3</option>
                     <!-- Add more options as needed -->
                  </select>
               </div>
               <div class="col-lg-12">
                  <label for="u_schedule">Schedule</label>
                  <div class="row">
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="u_schedule_am" id="u_schedule_am" required placeholder="00:00 AM">
                     </div>
                     <div class="col-lg-6">
                        <input type="text" class="form-control" name="u_schedule_pm" id="u_schedule_pm" required placeholder="00:00 PM">
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
@endsection