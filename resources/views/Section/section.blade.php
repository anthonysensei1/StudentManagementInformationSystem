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
            <table class="table table-bordered table-striped mt-2">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Section</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td></td>
                        <td></td>
                        <td class="text-center">
                        <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-id="" data-target="#updateSection">
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
            </div>
            <form action="#" class="formPost">
            <div class="modal-body">
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
            </div>
            <form action="#" class="formPost">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="section">Section</label>
                        <input type="text" class="form-control" name="u_section" id="u_section" required placeholder="section">
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
<div class="modal fade" id="deleteSection" data-backdrop="static">
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