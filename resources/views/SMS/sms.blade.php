@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <button class="btn btn-outline-success btn-md mt-2 mb-2" data-toggle="modal" data-target="#addMessage">Add New Message</button>
            <!-- TableArea -->
            <table id="example1" class="table table-bordered table-striped mt-2">
                <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Messages</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    @endphp
                    @if (count($SMS) > 0)
                    @foreach ($SMS as $message)
                    <tr class="text-center">
                        <td>{{ $counter }}</td>
                        <td>{{ $message['message'] }}</td>
                        <td class="text-center" width="500">
                            <button class="btn btn-outline-success btn-md" onclick="">
                                <i class="fas fa-envelope"></i>
                                send via email
                            </button>
                            <button class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#updateMessage" onclick="edit('{{ $message['id'] }}', { u_message: '{{ $message['message'] }}' })">
                                <i class="fas fa-pen"></i>
                                update
                            </button>
                            <button class="btn btn-outline-danger btn-md" data-toggle="modal" data-target="#deleteMessage" onclick="edit('{{ $message['id'] }}')">
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
<div class="modal fade" id="addMessage" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Add New Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sms_store') }}" class="formPost">
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label>Message</label>
                        <textarea class="form-control" name="message" id="message" required placeholder=". . ." rows="3"></textarea>
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
<div class="modal fade" id="updateMessage" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Update Message</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sms_update') }}" class="formPost">
                <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label>Message</label>
                        <textarea class="form-control" name="message" id="u_message" required placeholder=". . ." rows="3"></textarea>
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
<div class="modal fade" id="deleteMessage" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-secondary">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('sms_destroy') }}" class="formPost">
                <div class="modal-body">
                    <input type="text" class="form-control id" name="id" id="id" readonly hidden>
                    <!-- <input type="text" class="form-control status" name="status" id="status" readonly hidden> -->
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
        document.querySelectorAll('.sms').forEach(function(element) {
            element.classList.add('activated');
        });
    });
</script>

@endsection