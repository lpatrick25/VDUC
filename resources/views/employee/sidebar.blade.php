<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="@yield('equipments-active')">
            <a href="#menu-level" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left"></i><span>Equipments</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
            <ul id="menu-level" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li class="@yield('equipment-active')"><a href="{{ route('employee.equipments') }}"><i class="ri-record-circle-line"></i>Items</a></li>
                <li class="@yield('rental-active')"><a href="{{ route('employee.rentals') }}"><i class="ri-record-circle-line"></i>Rentals</a></li>
                <li class="@yield('employee1-active')"><a href="#"><i class="ri-record-circle-line"></i>Menu 3</a></li>
                <li class="@yield('employee2-active')"><a href="#"><i class="ri-record-circle-line"></i>Menu 4</a></li>
            </ul>
        </li>
    </ul>
</nav>
<div class="p-3"></div>
