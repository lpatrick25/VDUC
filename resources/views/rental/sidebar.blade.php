<nav class="iq-sidebar-menu">
    <ul id="iq-sidebar-toggle" class="iq-menu">
        <li class="@yield('dashboard-active')">
            <a href="#menu-level" class="iq-waves-effect collapsed"aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left">
                </i><span>Dashboard</span>
            </a>
        </li>
        <li class="@yield('rental-active')">
            <a href="{{ route('rental_client.rentals') }}" class="iq-waves-effect collapsed"aria-expanded="false"><i
                    class="ri-record-circle-line iq-arrow-left">
                </i><span>Rental Items</span>
            </a>
        </li>
    </ul>
</nav>
<div class="p-3"></div>
