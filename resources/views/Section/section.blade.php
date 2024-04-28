@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addSection">Add New Section</button>
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
                        <th>Section</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                    @endphp
                    @if (count($sections) > 0)
                        @foreach ($sections as $section)
                            <tr class="text-center">
                                <td>{{ $counter }}</td>
                                <td>Grade {{ $section['grade'] }}</td>
                                <td>{{ $section['section'] }}</td>
                                <td>@if($section['status'] === 0)
                                        <span class="text-danger">Disabled</span>
                                    @elseif($section['status'] === 1)
                                        <span class="text-success">Active</span>
                                    @endif</td>
                                <td class="text-center">
                                    <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#updateSection" onclick="edit('{{ $section['id'] }}', { u_section: '{{ $section['section'] }}', u_s_grade: '{{ $section['grade_level_id'] }}' })">
                                            <i class="fas fa-pen"></i>
                                            update
                                    </button>
                                    <button class="btn btn-md @if($section['status'] === 0) btn-outline-success @else btn-outline-danger @endif" data-toggle="modal" data-target="#disableEnable" onclick="edit('{{ $section['id'] }}', { status: '{{ $section['status'] }}' })">
                                        @if($section['status'] === 0)
                                            <i class="icon fas fa-check"></i> enable
                                        @elseif($section['status'] === 1)
                                            <i class="icon fas fa-ban"></i> disable
                                        @endif
                                    </button>
                                </td>
                            </tr>
                            @php
                                $counter++;
                            @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>
            <!-- EndTable -->
        </div>
    </section>
</div>


<!-- Modals/Dialogs -->


<!-- Add Dialog -->
<div class="modal fade" id="addSection" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Add New Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('section_store') }}" class="formPost">
            <div class="modal-body">
                <div class="col-lg-12">
                    <label>Grade</label>
                    <select class="form-control" name="s_grade" id="s_grade" required>
                        <option value="" disabled selected>Select Grade</option>
                        @foreach ($grades as $grade)
                            <option value="{{ $grade['id'] }}"> Grade {{ $grade['grade'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12">
                    <label for="section">Section</label>
                    <input type="text" class="form-control" name="section" id="section" required placeholder="section">
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
<div class="modal fade" id="updateSection" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Update Section</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('section_update') }}" class="formPost">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label>Grade</label>
                        <select class="form-control" name="s_grade" id="u_s_grade" required>
                            <option value="" disabled selected>Select Grade</option>
                            @foreach ($grades as $grade)
                                <option value="{{ $grade['id'] }}">Grade {{ $grade['grade'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12">
                        <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                        <label for="section">Section</label>
                        <input type="text" class="form-control" name="section" id="u_section" required placeholder="section">
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
         <form action="{{ route('section_destroy') }}" class="formPost">
            <div class="modal-body">
                <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                <input type="text" class="form-control status" name="status" id="status" readonly hidden>
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
        document.querySelectorAll('.sec').forEach(function(element) {
            element.classList.add('activated');
        });
    });
</script>
@endsection