<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">



    <li class="{{ Request::segment(2) == 'merchant' ? 'active' : '' }} nav-item"><a
            class="d-flex align-items-center" href="{{ route('admin.merchant.index') }}"><i data-feather="user"></i><span
                class="menu-title text-truncate" data-i18n="Home">Bookings</span></a>
    </li>




    <!-- <li class="{{ Request::segment(2) == 'agent' ? 'has-sub sidebar-group-active open' : '' }} nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Page Layouts">Agent</span></a>
        <ul class="menu-content">
            <li class="{{ Request::segment(2) == 'cashout' ? 'active' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Cashout</span></a>
            </li>
            <li class="{{ Request::segment(2) == 'agent' ? 'active' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">All Agent</span></a>
            </li>
            <li class="{{ Request::segment(2) == 'agent' ? 'active' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Add Agent</span></a>
            </li>
        </ul>
    </li>
    <li class="{{ Request::segment(2) == 'Accounts' ? 'has-sub sidebar-group-active open' : '' }} nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="user"></i><span class="menu-title text-truncate" data-i18n="Page Layouts">Accounts</span></a>
        <ul class="menu-content">
            <li class="{{ Request::segment(2) == 'balance' ? 'active' : '' }}"><a class="d-flex align-items-center" href=""><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Balance</span></a>
            </li>
        </ul>
    </li> -->
</ul>
