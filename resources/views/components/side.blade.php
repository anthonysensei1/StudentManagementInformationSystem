<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-dark">SMIS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->

        @if (auth()->user()->type == 1)
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link dash">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('class') }}" class="nav-link cla">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Classes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subject') }}" class="nav-link sub">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Subject & Schedule
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('student') }}" class="nav-link stu">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Student Management
                            </p>
                        </a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="{{ route('grade') }}" class="nav-link gra">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Grade Level
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('section') }}" class="nav-link sec">
                            <i class="nav-icon ion ion-clipboard"></i>
                            <p>
                                Section
                            </p>
                        </a>
                    </li> -->
                    <li class="nav-item">
                        <a href="{{ route('teacher') }}" class="nav-link tea">
                            <i class="nav-icon ion ion-ios-people-outline"></i>
                            <p>
                                Teachers
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="ass">
                            <i class="nav-icon fas fa-inbox"></i>
                            <p>
                                Assessments
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('enrollmentprocess') }}" class="nav-link enrollment_process">
                                    <i class="fas fa-user-graduate"></i>
                                    <p>Enrollment Process</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('payments') }}" class="nav-link pay">
                                    <i class="fas fa-money-bill-wave"></i>
                                    <p>Payments</p>
                                </a>
                            </li>
                            <hr class="hr">
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('rolesandpermissions') }}" class="nav-link rap">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                Roles and Permissions
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sms') }}" class="nav-link sms">
                            <i class="nav-icon far fa-envelope"></i>
                            <p>
                                Message Management
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('annualstudentroster') }}" class="nav-link annualstudentroster">
                            <i class="nav-icon far fa-chart-bar"></i>
                            <p>
                                Annual Student Roster
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        @else
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @php
                        $permissions = app()->call(
                            Route::getRoutes()->getByName('get_all_permission')->getAction()['controller'],
                        );
                        $array = explode(', ', $permissions);
                    @endphp

                    @foreach ($array as $item)
                        @if ($item == 'Dashboard')
                            <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link dash">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                        @elseif($item == 'Students')
                            <li class="nav-item">
                                <a href="{{ route('student') }}" class="nav-link stu">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Students
                                    </p>
                                </a>
                            </li>
                        @elseif($item == 'Grade Level')
                            <li class="nav-item">
                                <a href="{{ route('grade') }}" class="nav-link gra">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Grade Level
                                    </p>
                                </a>
                            </li>
                        @elseif($item == 'Section')
                            <li class="nav-item">
                                <a href="{{ route('section') }}" class="nav-link sec">
                                    <i class="nav-icon ion ion-clipboard"></i>
                                    <p>
                                        Section
                                    </p>
                                </a>
                            </li>
                        @elseif($item == 'Subject')
                            <li class="nav-item">
                                <a href="{{ route('subject') }}" class="nav-link sub">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>
                                        Subject
                                    </p>
                                </a>
                            </li>
                        @elseif($item == 'Teacher')
                            <li class="nav-item">
                                <a href="{{ route('teacher') }}" class="nav-link tea">
                                    <i class="nav-icon ion ion-ios-people-outline"></i>
                                    <p>
                                        Teachers
                                    </p>
                                </a>
                            </li>
                        @elseif($item == 'Class')
                            <li class="nav-item">
                                <a href="{{ route('class') }}" class="nav-link cla">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Classes
                                    </p>
                                </a>
                            </li>
                        @elseif($item == 'Assessments')
                            @if (auth()->user()->type == 3)
                                <li class="nav-item menu-is-opening menu-open">
                            @else
                                <li class="nav-item">
                            @endif
                                <a href="#" class="nav-link" id="ass">
                                    <i class="nav-icon fas fa-inbox"></i>
                                    <p>
                                        Assessments
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('enrollmentprocess') }}" class="nav-link enrollment_process">
                                            <i class="fas fa-user-graduate"></i>
                                            <p>Enrollment Process</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('payments') }}" class="nav-link pay">
                                            <i class="fas fa-money-bill-wave"></i>
                                            <p>Payments</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @elseif($item == 'Roles And Permissions')
                            <li class="nav-item">
                                <a href="{{ route('rolesandpermissions') }}" class="nav-link rap">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Roles and Permissions
                                    </p>
                                </a>
                            </li>
                        @elseif($item == 'SMS Management')
                            <li class="nav-item">
                                <a href="{{ route('sms') }}" class="nav-link sms">
                                    <i class="nav-icon nav-icon far fa-envelope"></i>
                                    <p>
                                        Message Management
                                    </p>
                                </a>
                            </li>
                            </li>
                        @elseif($item == 'Annual Student Roster')
                            <li class="nav-item">
                                <a href="{{ route('annualstudentroster') }}" class="nav-link annualstudentroster">
                                    <i class="nav-icon far fa-chart-bar"></i>
                                    <p>
                                        Annual Student Roster
                                    </p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </nav>
        @endif
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
