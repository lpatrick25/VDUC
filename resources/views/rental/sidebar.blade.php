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
                <li><a href="#"><i class="ri-record-circle-line"></i>Personal Diving Gear</a></li>
                <li><a href="#"><i class="ri-record-circle-line"></i>Breathing Apparatus</a></li>
                <li><a href="#"><i class="ri-record-circle-line"></i>Dive Instruments</a></li>
                <li><a href="#"><i class="ri-record-circle-line"></i>Communication & Safety Tools</a></li>
                <li><a href="#"><i class="ri-record-circle-line"></i>Specialized Survey Equipment</a></li>
            </ul>
        </li>
        <li>
            <a href="#" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="ri-record-circle-line iq-arrow-left"></i>
                <span>Rent History</span>
            </a>
        </li>
        <li>
            <a href="" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="ri-record-circle-line iq-arrow-left"></i>
                <span>Terms of Services</span>
            </a>
        </li>
        <li>
            <a href="" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false">
                <i class="ri-record-circle-line iq-arrow-left"></i>
                <span>Contact VDUCI</span>
            </a>
        </li>
    </ul>
</nav>
