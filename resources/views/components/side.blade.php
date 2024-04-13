<aside class="main-sidebar sidebar-light-primary elevation-4">
<!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-dark">SMIS</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link dash">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('student') }}" class="nav-link stu">
                    <i class="nav-icon fas fa-user"></i>
                        <p>
                            Students
                        </p>
                    </a>
                </li>
                <li class="nav-item">
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
                </li>
                <li class="nav-item">
                    <a href="{{ route('subject') }}" class="nav-link sub">
                    <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Subject
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('teacher') }}" class="nav-link tea">
                    <i class="nav-icon ion ion-ios-people-outline"></i>
                        <p>
                            Teachers
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
                    <a href="{{ route('payments') }}" class="nav-link pay">
                    <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Payments
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('rolesandpermissions') }}" class="nav-link rap">
                    <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Roles and Permissions
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>