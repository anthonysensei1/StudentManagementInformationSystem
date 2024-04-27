@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addGrade">Add New Grade</button>
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
                        <th>Grade</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @if (count($grade_levels) > 0)
                        @foreach ($grade_levels as $grade_level)
                            <tr class="text-center">
                                <td>{{ $counter }}</td>
                                <td>Grade {{ $grade_level['grade'] }}</td>
                                <td>
                                    @if($grade_level['status'] === 0)
                                        <span class="text-danger">Disabled</span>
                                    @elseif($grade_level['status'] === 1)
                                        <span class="text-success">Active</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#updateGrade" onclick="edit('{{ $grade_level['id'] }}', { u_grade: '{{ $grade_level['grade'] }}' })">
                                            <i class="fas fa-pen"></i>
                                            update
                                    </button>
                                    <button class="btn btn-md @if($grade_level['status'] === 0) btn-outline-success @else btn-outline-danger @endif" data-toggle="modal" data-target="#disableEnable" onclick="edit('{{ $grade_level['id'] }}', { status: '{{ $grade_level['status'] }}' })">
                                        @if($grade_level['status'] === 0)
                                            <i class="icon fas fa-check"></i> enable
                                        @elseif($grade_level['status'] === 1)
                                            <i class="icon fas fa-ban"></i> disable
                                        @endif
                                    </button>
                                </td>
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center">No data is displayed!</td>
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
<div class="modal fade" id="addGrade" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Add New Grade</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('grade_store') }}" class="formPost">
            <div class="modal-body">
                <div class="col-lg-12">
                    <label for="grade">Grade</label>
                    <input type="text" class="form-control" name="grade" id="grade" required placeholder="grade">
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
            <form action="{{ route('grade_update') }}" class="formPost">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                        <label for="grade">Grade</label>
                        <input type="text" class="form-control" name="grade" id="u_grade" required placeholder="grade">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success btn-md">
                        <i class="fas fa-check"></i>
                        save
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
<div class="modal fade" id="disableEnable" data-backdrop="static">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header bg-gradient-secondary">
            <h4 class="modal-title">Confirmation</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{ route('grade_destroy') }}" class="formPost">
            <div class="modal-body">
               <input type="text" class="form-control id" name="id" id="id" readonly hidden>
               <input type="text" class="form-control status" name="status" id="status" readonly hidden>
               <h4>Are you certain you wish to proceed the changes?</h4>
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
        document.querySelectorAll('.gra').forEach(function(element) {
            element.classList.add('activated');
        });
    });
</script>

@endsection