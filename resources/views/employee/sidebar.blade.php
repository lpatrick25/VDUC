<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="@yield('dashboard-active')">
            <a href="#menu-level" class="iq-waves-effect collapsed"aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left">
                </i><span>Dashboard</span>
            </a>
        </li>
        <li class="@yield('equipments-active')">
            <a href="#menu-equipments" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left"></i><span>Equipments</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="menu-equipments" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li class="@yield('equipment-active')"><a href="{{ route('employee.equipments') }}"><i
                            class="ri-record-circle-line"></i>Items</a></li>
                <li class="@yield('rental-active')"><a href="{{ route('employee.rentals') }}"><i
                            class="ri-record-circle-line"></i>Rentals</a></li>
            </ul>
        </li>
        <li class="@yield('diving-active')">
            <a href="#menu-diving" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left"></i><span>Diving</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="menu-diving" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li class="@yield('lesson-active')"><a href="{{ route('employee.lesson') }}"><i
                            class="ri-record-circle-line"></i>Lesson</a></li>
                <li class="@yield('applications-active')"><a href="{{ route('employee.applications') }}"><i
                            class="ri-record-circle-line"></i>Applications</a></li>
                <li class="@yield('student-active')"><a href="{{ route('employee.students') }}"><i
                            class="ri-record-circle-line"></i>Student</a></li>
            </ul>
        </li>
        <li class="@yield('vessels-active')">
            <a href="#menu-vessels" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left"></i><span>Vessels</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="menu-vessels" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li class="@yield('vessel-active')"><a href="{{ route('employee.vessels') }}"><i
                            class="ri-record-circle-line"></i>Lists</a></li>
                <li class="@yield('service-active')"><a href="{{ route('employee.services') }}"><i
                            class="ri-record-circle-line"></i>Services</a></li>
                <li class="@yield('schedule-active')"><a href="{{ route('employee.schedules') }}"><i
                            class="ri-record-circle-line"></i>Schedules</a></li>
                <li class="@yield('inspection-active')"><a href="{{ route('employee.inspection') }}"><i
                            class="ri-record-circle-line"></i>Inspections</a></li>
            </ul>
        </li>
        <li class="@yield('reports-active')">
            <a href="#menu-reports" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left"></i><span>Reports</span><i
                    class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="menu-reports" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li class="@yield('equipment-report-active')"><a href="{{ route('reports.equipmentReportIndex') }}"><i
                            class="ri-record-circle-line"></i>Equipments</a></li>
                <li class="@yield('diving-report-active')"><a href="{{ route('reports.divingReportIndex') }}"><i
                            class="ri-record-circle-line"></i>Diving</a></li>
                <li class="@yield('vessel-report-active')"><a href="{{ route('reports.vesselReportIndex') }}"><i
                            class="ri-record-circle-line"></i>Vessels</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div class="p-3"></div>
