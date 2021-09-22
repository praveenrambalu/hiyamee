<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown active">
                <a class="dropdown-toggle" href="/dashboard">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            @switch(Auth::user()->user_type)
                @case('superadmin')
                


                    <li class="nav-item dropdown @yield('companies')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-build"></i>
                            </span>
                            <span class="title">Companies</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('companies-add')">
                                <a href="/companies/">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add  Companies "></span></a>
                            </li>
                            <li class="@yield('companies-view')">
                                <a href="/companies/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Companies "></span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown @yield('jobs')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <span class="title">Jobs</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('jobs-add')">
                                <a href="/jobs/admin/select">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add  jobs "></span></a>
                            </li>
                            <li class="@yield('jobs-view')">
                                <a href="/jobs/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Jobs "></span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown @yield('recruiter')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fas fa-users"></i>
                            </span>
                            <span class="title">Recruiter 
                            </span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('recruiter-add')">
                                <a href="/recruiter/">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add Recuiters "></span> </a>
                            </li>
                            <li class="@yield('recruiter-view')">
                                <a href="/recruiter/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View  Recuiters "></span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown @yield('subadmin')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fas fa-user"></i>
                            </span>
                            <span class="title">Admin</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('subadmin-add')">
                                <a href="/admin/">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add Sub Admin "></span></a>
                            </li>
                            <li class="@yield('subadmin-view')">
                                <a href="/admin/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Sub Admin "></span></a>
                            </li>
                        </ul>
                    </li>
                 

                    <li class="nav-item dropdown @yield('fields')">
                        <a class="dropdown-toggle" href="/fields">
                            <span class="icon-holder">
                                <i class="fab fa-wpforms"></i>
                            </span>
                            <span class="title">Fields <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Manage Additional Fields  "></span></span>
                        </a>
                    </li>
               

                @break
                @case('subadmin')
                    <li class="nav-item dropdown @yield('companies')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-build"></i>
                            </span>
                            <span class="title">Companies</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('companies-view')">
                                <a href="/companies/view">View  <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Companies "></span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown @yield('jobs')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <span class="title">Jobs</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('jobs-add')">
                                <a href="/jobs/admin/select">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add  jobs "></span></a>
                            </li>
                            <li class="@yield('jobs-view')">
                                <a href="/jobs/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Jobs "></span></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown @yield('recruiter')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fas fa-users"></i>
                            </span>
                            <span class="title">Recruiter</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('recruiter-add')">
                                <a href="/recruiter/">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add Recruiters "></span></a>
                            </li>
                            <li class="@yield('recruiter-view')">
                                <a href="/recruiter/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Recruiters "></span></a>
                            </li>
                        </ul>
                    </li>
                @break
                @case('admin')
                    <li class="nav-item dropdown @yield('jobs')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <span class="title">Jobs</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('jobs-add')">
                                <a href="/jobs/">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add  Jobs "></span></a>
                            </li>
                            <li class="@yield('jobs-view')">
                                <a href="/jobs/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Jobs "></span></a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown @yield('employees')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fas fa-users"></i>
                            </span>
                            <span class="title">Employees</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('employees-add')">
                                <a href="/employees/">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add Employees "></span></a>
                            </li>
                            <li class="@yield('employees-view')">
                                <a href="/employees/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Employees "></span></a>
                            </li>

                        </ul>
                    </li>
                @break

                @case('recruiter')
                    <li class="nav-item dropdown @yield('companies')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-build"></i>
                            </span>
                            <span class="title">Companies</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('companies-view')">
                                <a href="/companies/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Companies "></span></a>
                            </li>
                        </ul>
                    </li>
                @break
                @case('employee')
                    <li class="nav-item dropdown @yield('jobs')">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="fas fa-briefcase"></i>
                            </span>
                            <span class="title">Jobs</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="@yield('jobs-add')">
                                <a href="/jobs">Add <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Add  jobs "></span></a>
                            </li>
                            <li class="@yield('jobs-view')">
                                <a href="/jobs/view">View <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Jobs "></span></a>
                            </li>
                          
                        </ul>
                    </li>
                @break
                @default
                  
                @break
            @endswitch

            <li class="nav-item dropdown ">
                <a class="dropdown-toggle" href="/candidates">
                    <span class="icon-holder">
                        <i class="fas fa-tasks"></i>
                    </span>
                    <span class="title">Candidates <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View All Candidates "></span></span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a class="dropdown-toggle" href="/calendar">
                    <span class="icon-holder">
                        <i class="anticon anticon-calendar"></i>
                    </span>
                    <span class="title">Interviews <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="View Scheduled Interviews  "></span></span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a class="dropdown-toggle" href="/store-resume">
                    <span class="icon-holder">
                        <i class="fas fa-id-card"></i>
                    </span>
                    <span class="title">Resume Link Generator <span class="fa fa-info-circle infocircle"  data-toggle="tooltip" data-placement="right" title="Upload resume to a storage and get a link for bulk upload "></span></span>
                </a>
            </li>
            <li class="nav-item dropdown ">
                <a class="dropdown-toggle" href="/logout">
                    <span class="icon-holder">
                        <i class="anticon anticon-lock"></i>
                    </span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>