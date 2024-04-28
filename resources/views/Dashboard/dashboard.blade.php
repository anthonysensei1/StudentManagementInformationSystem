@extends('layout.app')
@section('content')
<!-- Main content -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            @if (auth()->user()->type == 1)
            <div class="row pt-4">
                <!-- Student -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('student') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="text"> Students </div>
                        </div>
                    </a>
                </div>

                <!-- Grade -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('grade') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="text"> Grade </div>
                        </div>
                    </a>
                </div>

                <!-- Section -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('section') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="ion ion-clipboard"></i>
                            </div>
                            <div class="text"> Section </div>
                        </div>
                    </a>
                </div>

                <!-- Subject -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('subject') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="text"> Subject </div>
                        </div>
                    </a>
                </div>

                <!-- Teacher -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('teacher') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="ion ion-ios-people-outline"></i>
                            </div>
                            <div class="text"> Teachers </div>
                        </div>
                    </a>
                </div>

                <!-- Classes -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('class') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text"> Classes </div>
                        </div>
                    </a>
                </div>


                <!-- Classes -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('enrollmentprocess') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div class="text"> Enrollment Process </div>
                        </div>
                    </a>
                </div>

                <!-- Payments -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('payments') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="fas fa-inbox"></i>
                            </div>
                            <div class="text"> Payments </div>
                        </div>
                    </a>
                </div>

                <!-- Settings -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('rolesandpermissions') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="fas fa-cog"></i>
                            </div>
                            <div class="text"> Roles and Permissions </div>
                        </div>
                    </a>
                </div>

                <!-- Message Management -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('sms') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="text"> Message Management </div>
                        </div>
                    </a>
                </div>

                <!-- Message Management -->
                <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <a href="{{ route('annualstudentroster') }}" class="small-box">
                        <div class="inner">
                            <div class="icons">
                                <i class="far fa-chart-bar"></i>
                            </div>
                            <div class="text"> Annual Student Roster </div>
                        </div>
                    </a>
                </div>

            </div>

            <div class="graph">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">GRAPHICAL PRESENTATION</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <p class="d-flex flex-column">
                                <span class="text-bold text-lg"></span>
                                <span>Total Enrolled of School Year</span>
                            </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                            <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This year
                            </span>

                            <span>
                                <i class="fas fa-square text-gray"></i> Last year
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <!-- This commented below, will be shown only if the status of the user logged in is TEACHER -->

            <button type="button" class="btn btn-outline-primary btn-md mb-2 mt-2" id="updateTInformation">
                <i class="fas fa-pen"></i>
                Update Information
            </button>
            <form action="{{ route('update_user') }}" class="formPost">
                <button type="submit" class="btn btn-success btn-md ml-2 mb-2 mt-2" id="saveTInformation"
                    style="display: none;">
                    <i class="fas fa-check"></i>
                    Save
                </button>
                <div class="form-group">
                    <div class="students_img">
                        <img src="{{ asset('images_teacher/' . session('upload_image_name')) }}">
                    </div>
                    <div class="fullname text-center">{{ session('name') }}</div>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Employee ID :</td>
                            <td> <input type="number" class="form-control" name="employee_id" id="t_id"
                                    placeholder="employee ID" value="{{ session('em_id') }}" readonly> </td>
                        </tr>
                        <tr>
                            <td>Username :</td>
                            <td> <input type="text" class="form-control" name="username" id="t_user"
                                    placeholder="username" value="{{ session('user_name') }}" readonly> </td>
                        </tr>
                        <tr>
                            <td>Address :</td>
                            <td> <input type="text" class="form-control" name="address" id="t_address"
                                    placeholder="address" value="{{ session('address') }}" readonly> </td>
                        </tr>
                        <tr>
                            <td>Date of Birth :</td>
                            <td> <input type="date" class="form-control" name="b_date" id="t_dob"
                                    value="{{ session('b_date') }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Gender :</td>
                            <td> <input type="text" class="form-control" name="gender" id="t_gender"
                                    placeholder="gender" value="{{ session('gender') == 1 ? 'Male' : 'Female' }}"
                                    readonly> </td>
                        </tr>
                        <tr>
                            <td>Email Address :</td>
                            <td> <input type="email" class="form-control" name="email_add" id="t_eadd"
                                    placeholder="email address" value="{{ session('e_address') }}" readonly> </td>
                        </tr>
                        <tr>
                            <td>Contact No. :</td>
                            <td> <input type="number" class="form-control" name="contact_number" id="t_contact_no"
                                    placeholder="ex.09123456789" value="{{ session('c_number') }}" readonly> </td>
                        </tr>
                        <tr>
                            <td>Date Created :</td>
                            <td> <input type="date" class="form-control" name="c_date" id="c_date"
                                    value="{{ \Carbon\Carbon::parse(session('d_created'))->format('Y-m-d') }}" disabled>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            @endif

        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.dash').forEach(function(element) {
        element.classList.add('activated');
    });
});

document.getElementById('updateTInformation').addEventListener('click', function() {
    var inputs = document.querySelectorAll(
        'input[type="text"], input[type="date"], input[type="number"], input[type="email"]');
    inputs.forEach(function(input) {
        input.removeAttribute('readonly');
    });
    document.getElementById('saveTInformation').style.display = 'inline';
});


$(function() {
    'use strict'


    var ticksStyle = {
        fontColor: '#495057',
        fontStyle: 'bold'
    }

    var mode = 'index'
    var intersect = true

    var $salesChart = $('#sales-chart')
    // eslint-disable-next-line no-unused-vars
    var salesChart = new Chart($salesChart, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MARCH', 'APRIL', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                    backgroundColor: '#007bff',
                    borderColor: '#007bff',
                    data: arrCurrentYear
                },
                {
                    backgroundColor: '#ced4da',
                    borderColor: '#ced4da',
                    data: arrLastYear
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                mode: mode,
                intersect: intersect
            },
            hover: {
                mode: mode,
                intersect: intersect
            },
            legend: {
                display: false
            }
        }
    })
})
</script>
@endsection