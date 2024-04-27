@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
        </div>
    </section>
</div>


<!-- Modals/Dialogs -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.enrollment_process').forEach(function(element) {
            element.classList.add('activated');
        });
    });
</script>

@endsection