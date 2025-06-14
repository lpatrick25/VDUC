<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="@yield('dashboard-active')">
            <a href="#dashboard-submenu" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="ri-record-circle-line iq-arrow-left"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="@yield('equipments-active')">
            <a href="#equipments-submenu" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="ri-record-circle-line iq-arrow-left"></i>
                <span>Equipments</span>
                <i class="ri-arrow-right-s-line iq-arrow-right"></i>
            </a>
            <ul id="equipments-submenu" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                <li><a href="#"><i class="ri-record-circle-line"></i>Menu 1</a></li>
                <li><a href="#"><i class="ri-record-circle-line"></i>Menu 2</a></li>
                <li><a href="#"><i class="ri-record-circle-line"></i>Menu 3</a></li>
                <li><a href="#"><i class="ri-record-circle-line"></i>Menu 4</a></li>
            </ul>
        </li>
        <li class="@yield('rent-history-active')">
            <a href="#rent-history-submenu" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="ri-record-circle-line iq-arrow-left"></i>
                <span>Rent History</span>
            </a>
        </li>
        <li class="@yield('terms-of-service-active')">
            <a href="" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="ri-record-circle-line iq-arrow-left"></i>
                <span>Terms of Services</span>
            </a>
        </li>
        <li class="@yield('contact-vduci-active')">
            <a href="" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="ri-record-circle-line iq-arrow-left"></i>
                <span>Contact VDUCI</span>
            </a>
        </li>
    </ul>
</nav>
