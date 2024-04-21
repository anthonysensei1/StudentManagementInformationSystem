@extends('layout.app')
@section('content')
    <!-- Main content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @if (auth()->user()->type == 1)
                    <div class="row pt-5">
                        <!-- Student -->
                        <div class="col-lg-3 col-6">
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
                        <div class="col-lg-3 col-6">
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
                        <div class="col-lg-3 col-6">
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
                        <div class="col-lg-3 col-6">
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
                        <div class="col-lg-3 col-6">
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

                        <!-- Payments -->
                        <div class="col-lg-3 col-6">
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

                        <!-- Payments -->
                        <div class="col-lg-3 col-6">
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
                        <div class="col-lg-3 col-6">
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

                    </div>
                @else
                    <!-- This commented below, will be shown only if the status of the user logged in is TEACHER -->

                    <button class="btn btn-outline-primary btn-md mb-2 mt-2" id="updateTInformation">
                        <i class="fas fa-pen"></i>
                        Update Information
                    </button>
                    <button class="btn btn-success btn-md ml-2 mb-2 mt-2" id="saveTInformation" style="display: none;">
                        <i class="fas fa-check"></i>
                        Save
                    </button>
                    <div class="form-group">
                        <div class="students_img">
                            <img src="{{ asset('dist/img/nopp.png') }}">
                        </div>
                        <div class="fullname text-center">Bless S. Muring</div>
                    </div>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Employee ID :</td>
                                <td> <input type="text" class="form-control" name="t_id" id="t_id"
                                        placeholder="employee ID" readonly> </td>
                            </tr>
                            <tr>
                                <td>Username :</td>
                                <td> <input type="text" class="form-control" name="t_user" id="t_user"
                                        placeholder="username" readonly> </td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td> <input type="text" class="form-control" name="t_address" id="t_address"
                                        placeholder="address" readonly> </td>
                            </tr>
                            <tr>
                                <td>Date of Birth :</td>
                                <td> <input type="date" class="form-control" name="t_dob" id="t_dob" readonly>
                                </td>
                            </tr>
                            <tr>
                                <td>Gender :</td>
                                <td> <input type="text" class="form-control" name="t_gender" id="t_gender"
                                        placeholder="gender" readonly> </td>
                            </tr>
                            <tr>
                                <td>Email Address :</td>
                                <td> <input type="text" class="form-control" name="t_eadd" id="t_eadd"
                                        placeholder="email address" readonly> </td>
                            </tr>
                            <tr>
                                <td>Contact No. :</td>
                                <td> <input type="text" class="form-control" name="t_contact_no" id="t_contact_no"
                                        placeholder="ex.09123456789" readonly> </td>
                            </tr>
                            <tr>
                                <td>Date Created :</td>
                                <td> <input type="date" class="form-control" name="t_date" id="t_date" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    </script>

    <script>
        document.getElementById('updateTInformation').addEventListener('click', function() {
            var inputs = document.querySelectorAll('input[type="text"], input[type="date"]');
            inputs.forEach(function(input) {
                input.removeAttribute('readonly');
            });
            document.getElementById('saveTInformation').style.display = 'inline';
        });
    </script>
@endsection
