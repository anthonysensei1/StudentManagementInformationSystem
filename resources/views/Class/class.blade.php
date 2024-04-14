@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid pt-2">
         <button class="btn btn-outline-success btn-md mb-2" data-toggle="modal" data-target="#addClass">Add New Class</button>
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
                  <th>Class</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <tr class="text-center">
                  <td></td>
                  <td></td>
                  <td class="text-center">
                  <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#updateClass">
                     <i class="fas fa-pen"></i>
                     update
                  </button>
                  <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-id="" data-target="#deleteSection">
                     <i class="fas fa-trash"></i>
                     delete
                  </button>
                  </td>
               </tr>
            </tbody>
         </table>
         <!-- EndTable -->

         
         <!-- This table will be shown only if the status of the user logged in is TEACHER -->
         <!-- TableArea -->
         <!-- <table id="example1" class="table table-bordered table-striped">
            <thead>
               <tr class="text-center">
                  <th>#</th>
                  <th>Class</th>
                  <th>Subject</th>
                  <th>Schedule</th>
               </tr>
            </thead>
            <tbody>
               <tr class="text-center">
                  <td>1</td>
                  <td><a href="#" class="student_name" data-toggle="modal" data-target="#studentListModal">Grade 2 - A</a></td>
                  <td>Subject</td>
                  <td>8:00 AM - 9:00 AM</td>
               </tr>
            </tbody>
         </table> -->
         <!-- EndTable -->

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
                  <tbody>
                     <tr class="text-center">
                        <td>1</td>
                        <td><a href="#" class="student_name" data-toggle="modal" data-target="#studentGradeModal">1001</a></td>
                        <td>10003234</td>
                        <td>Gumatay, Jemima Najos</td>
                     </tr>
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
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="row">
                  <div class="col-lg-6">
                     <!-- TableArea -->
                     <table class="table table-bordered">
                        <tbody>
                           <tr>
                              <td>ID No. :</td>
                              <td> <a href="#">1001</a> </td>
                           </tr>
                           <tr>
                              <td>LRN :</td>
                              <td>10003234</td>
                           </tr>
                           <tr>
                              <td>Name :</td>
                              <td>Gumatay, Jemima Najos</td>
                           </tr>
                           <tr>
                              <td>Grade Level :</td>
                              <td>Grade 2</td>
                           </tr>
                           <tr>
                              <td>Section :</td>
                              <td>A</td>
                           </tr>
                        </tbody>
                     </table>
                     <!-- EndTable -->
                     <div class="modal-footer">
                        School Year 2023 - 2024
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="sub_label">
                        Subject
                     </div>
                     <input type="text" class="form-control" name="sub_in" class="sub_in" readonly>
                     <div class="ag_label">
                        Add Grade
                     </div>
                     <table class="table table-bordered">
                        <tbody>
                           <tr>
                              <td>1st Quarter</td>
                              <td class="editable-cell"> 91 </td>
                           </tr>
                           <tr>
                              <td>2nd Quarter</td>
                              <td class="editable-cell"> 85 </td>
                           </tr>
                           <tr>
                              <td>3rd Quarter</td>
                              <td class="editable-cell"> 89 </td>
                           </tr>
                           <tr>
                              <td>4th Quarter</td>
                              <td class="editable-cell"> 87 </td>
                           </tr>
                           <tr>
                              <td>Final Rating</td>
                              <td class="final_grade_result"></td>
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
                  </div>
               </div>
            </div>
         </form>
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
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="col-lg-12">
                  <label for="c_grade">Grade</label>
                  <select class="form-control" name="c_grade" id="c_grade" required>
                     <option value="" disabled selected>Select Grade</option>
                     <option value="Grade 1">Grade 1</option>
                     <option value="Grade 2">Grade 2</option>
                     <option value="Grade 3">Grade 3</option>>
                  </select>
               </div>
               <div class="col-lg-12">
                  <label for="c_section">Section</label>
                  <select class="form-control" name="c_section" id="c_section" required>
                     <option value="" disabled selected>Select Section</option>
                     <option value="A">A</option>
                     <option value="B">B</option>
                     <option value="C">C</option>
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
         <form action="#" class="formPost">
            <div class="modal-body">
               <div class="col-lg-12">
                  <label for="u_c_grade">Grade</label>
                  <select class="form-control" name="u_c_grade" id="u_c_grade" required>
                     <option value="" disabled selected>Select Grade</option>
                     <option value="Grade 1">Grade 1</option>
                     <option value="Grade 2">Grade 2</option>
                     <option value="Grade 3">Grade 3</option>>
                  </select>
               </div>
               <div class="col-lg-12">
                  <label for="u_c_section">Section</label>
                  <select class="form-control" name="u_c_section" id="u_c_section" required>
                     <option value="" disabled selected>Select Section</option>
                     <option value="A">A</option>
                     <option value="B">B</option>
                     <option value="C">C</option>
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
    });
</script>

@endsection