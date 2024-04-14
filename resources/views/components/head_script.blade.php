<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<!-- iCheck -->
<link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- fullCalendar -->
<link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.css')}}">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="{{asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
<!-- Toastr -->
<link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">

<!-- Web Icon -->
<link rel="shortcut icon" href=""> 

<style>

  .selected {
      background-color: #6c757d;
      border-top: .1px solid #fff;
      color: #fff;
  }

  #permissionRole, #u_permissionRole {
      padding: 20px;
  }

  .activated{
    background-color: rgba(173, 255, 47, 0.7);
    box-shadow: 0 0 10px rgba(192, 192, 192, 0.7);
  }

  .students_img{
    background: radial-gradient(circle at 18.7% 37.8%, rgb(250, 250, 250) 0%, rgb(225, 234, 238) 90%);
    display: flex;
    justify-content: space-around;
    padding: 10px 5px 10px 5px;
    margin-bottom: 5px;
    border-radius: 3px;
  }

  .students_img img{
    width: 200px;
    height: 200px;
    object-fit: cover; 
    border-radius: 50%;
  }

  .icons{
    font-size: 5em;
    text-align: center;
  }

  .text{
    font-size: 20px;
    text-align: center;
    font-weight: 900;
    font-family: serif;
    letter-spacing: 2px;
  }

  .small-box{
    color: #000;
    transition: transform .5s, box-shadow 0.5s, color 0.3s;
  }
  .small-box:hover{
    cursor: pointer;
    transform: scale(.85);
    box-shadow: 0 0 20px rgba(173, 255, 47, 0.7);
    color: rgba(0, 128, 0, 0.7);
  }

  .student_name{
    color: #000;
  }
  .student_name:hover{
    text-decoration: underline;
  }

  .g_label{
    color: #212529;
    font-weight: 900;
  }

  .radio-wrapper {
    display: flex;
    gap: 10px;

  }

  .radios input[type="radio"] {
    width: 53px;
    height: 22px;
    border-radius: 50%;
    margin-right: -8px;
    vertical-align: middle;
    border: 1px solid #ccc;
    display: inline-flex;
    cursor: pointer;
  }

  .radios label {
    cursor: pointer;
    display: inline-flex;
    margin-left: 5px;
  }

  .radios input[type="radio"]:checked {
      background-color: #007bff;
      border-color: #007bff;
  }

  .students_info{
    font-size: 20px;
    font-weight: 900;
    letter-spacing: 3px;
    color: #6c757d;
  }
  .students_parents_info{
    font-size: 20px;
    font-weight: 900;
    letter-spacing: 3px;
    color: #6c757d;
  }

  .students_row{
    box-sizing: border-box;
    border: 1px solid #6c757d;
    border-radius: 5px;
    padding: 10px;
  }

  .students_parents_row{
    box-sizing: border-box;
    border: 1px solid #6c757d;
    border-radius: 5px;
    padding: 10px;
  }

  .optional{
    color:#6c757d;
  }


  .gl_label{
    color: #212529;
    font-weight: 900;
  }

  .radio-wrapper-grade-level {
    display: flex;
    gap: 10px;
  }

  .radios_gl input[type="radio"] {
    width: 53px;
    height: 22px;
    border-radius: 50%;
    margin-right: -8px;
    vertical-align: middle;
    border: 1px solid #ccc;
    display: inline-flex;
    cursor: pointer;
  }

  .radios_gl label {
      cursor: pointer;
  }

  .radios_gl input[type="radio"]:checked {
      background-color: #007bff;
      border-color: #007bff;
  }

  .section_label{
    color: #212529;
    font-weight: 900;
  }

  .radio-wrapper-section{
    display: flex;
    gap: 10px;
  }

  .radios_section input[type="radio"] {
    width: 53px;
    height: 22px;
    border-radius: 50%;
    margin-right: -8px;
    vertical-align: middle;
    border: 1px solid #ccc;
    display: inline-flex;
    cursor: pointer;
  }

  .radios_section label {
      cursor: pointer;
  }

  .radios_section input[type="radio"]:checked {
      background-color: #007bff;
      border-color: #007bff;
  }

  .returns{
    border:1px solid #6c757d;
    border-radius: 1px;
    display: flex;
    justify-content: space-around;
    font-size: 20px;
    font-weight: 900;
  }

  .fullname{
    font-size: 18px;
    font-weight: 900;
    letter-spacing: 2px;
  }

  .classes_label{
    color: #212529;
    font-weight: 900;
  }

  .radio-wrapper-classes{
    display: flex;
    gap: 10px;
    flex-direction: column;
    flex-wrap: wrap;
  }

  .radios_classes input[type="radio"] {
    width: 53px;
    height: 22px;
    border-radius: 50%;
    margin-right: -8px;
    vertical-align: middle;
    border: 1px solid #ccc;
    display: inline-flex;
    cursor: pointer;
  }

  .radios_classes label {
      cursor: pointer;
  }

  .radios_classes input[type="radio"]:checked {
      background-color: #007bff;
      border-color: #007bff;
  }

  .division{
    display:flex;
    justify-content: space-between;
    border-bottom:3px solid #6c757d;
    flex-direction: row-reverse
  }
  .lsf{
    display:flex;
    align-items: flex-end;
  }

  .lsf_label{
    font-size: 25px;
    font-weight: 900;
    letter-spacing: 2px;
  }
  .btn_list{
    display: flex;
    justify-content: flex-end;
    
  }
  .buttons{
    margin: 10px;
  }

  .LSG{
    font-size: 22px;
    font-weight: 900;
  }
  .LSG .lsg{
    font-size: 18px!important;
    font-weight: 0!important;
  }
  .receipt_label{
    font-size: 22px;
    font-weight: 900;
    margin-top: 50px;
  }
  .fta{
    display:flex;
    justify-content: space-between;
  }

  .da{
    display:flex;
    justify-content: space-between;
  }

  .top_division{
    margin-top: 25px;
  }

  .result_division{
    margin-top: 10px;
  }

  .rda{
    border-top:2px solid #dee2e6;
  }

  .gotoMainTable{
    color: #000;
    font-size: 20px;
    font-weight:bold;
  }
  .gotoMainTable:hover{
    text-decoration: underline;
  }
  .gotoMainTable{
    display:flex;
    align-items: center;
  }
  .FeeEntryMainDiv{
    display:flex;
    justify-content: space-between;
  }
  .details{
    border: 1px solid #000;
    border-radius: 2px;
    width: 100%;
    padding: 15px;
  }
  .feeDetails{
    border: 1px solid #000;
    border-radius: 2px;
    width: 100%;
    padding: 15px;
  }
  .dfd{
    margin-bottom: 15px;
  }
  .nfe_div{
    border:1px solid #000;
    margin-top:10px;
  }
  .addToList{
    display:flex;
    justify-content: center;
    margin-top: 10px;
  }
  .totalDiv{
    display:flex;
    justify-content: space-evenly;
    font-size: 20px;
    font-weight:bold;
  }

  .totalResult{
    color: #dc3545;
  }
  .prpMonth{
    display:flex;
    justify-content: flex-end;
    align-items: center;
  }
  .lblMonth{
    margin-right: 10px;
    font-size: 18px;
    font-weight: 900;
    letter-spacing: 2px;
    width: 100%;
  }

  .small-box{
    background-image:url('{{asset ('../../dist/img/green.png')}}');
    background-position:center;
    background-repeat: no-repeat;
  }

  .schoolyear{
    letter-spacing:2px;
    font-size: 20px;
    font-weight: 900;
  }

  .editable-cell{
    width: 100px;
  }

  .save_grade{
    display: flex;
    justify-content: flex-end;
  }
</style>





















<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{asset('plugins/fullcalendar/main.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "searching": false,
      "ordering":false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>