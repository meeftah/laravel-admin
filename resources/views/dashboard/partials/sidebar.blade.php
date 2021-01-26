<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo justify-content-center">
    <a href="{{ route('dashboard.home') }}">
        <img src="{{ asset('assets/common/logo.png') }}" height="50px">
    </a>
</div>

<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigasi</label>
    <div class="br-sideleft-menu">
        {{-- Beranda --}}
        <a href="{{ route('dashboard.home') }}"
            class="br-menu-link {{ set_active([Request::is('dashboard/home'), Request::is('dashboard/home/')]) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home tx-22"></i>
                <span class="menu-item-label">Beranda</span>
            </div>
        </a>

        {{-- Manajement User --}}
        @if(auth()->user()->can('users_lihat') ||
        auth()->user()->can('roles_lihat') ||
        auth()->user()->can('permissions_lihat'))
        <a href="javascript: void(0);"
            class="br-menu-link {{ set_active([Request::is('dashboard/users*'), Request::is('dashboard/roles*'), Request::is('dashboard/permissions*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-people tx-24"></i>
                <span class="menu-item-label">Manajemen User</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            @can('users_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.users.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/users*')) }}">Pengguna</a>
            </li>
            @endcan
            @can('roles_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.roles.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/roles*')) }}">Peran</a>
            </li>
            @endcan
            @can('permissions_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.permissions.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/permissions*')) }}">Hak
                    Akses</a></li>
            @endcan
        </ul>
        @endif

        {{-- Logout --}}
        <a href="javascript: void(0);" class="br-menu-link text-danger" data-toggle="modal" data-target="#logoutModal">
            <div class=" br-menu-item">
                <i class="menu-item-icon icon ion-log-out tx-22"></i>
                <span class="menu-item-label">Logout</span>
            </div><!-- br-sideleft-menu -->
        </a>
    </div><!-- br-sideleft -->
</div>