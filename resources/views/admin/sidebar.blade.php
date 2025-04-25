<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="@yield('user-active')">
            <a href="#menu-level" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left">
                </i><span>User Account</span>
                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
            </a>
            <ul id="menu-level" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li class="@yield('employee-active')"><a href="{{ route('admin.employees') }}"><i class="ri-record-circle-line"></i>Employees</a></li>
                <li class="@yield('student-active')"><a href="{{ route('admin.students') }}"><i class="ri-record-circle-line"></i>Students</a></li>
                <li class="@yield('survey-active')"><a href="{{ route('admin.surveys') }}"><i class="ri-record-circle-line"></i>Survey Clients</a></li>
                <li class="@yield('rental-active')"><a href="{{ route('admin.rentals') }}"><i class="ri-record-circle-line"></i>Rental Clients</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div class="p-3"></div>
