<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo justify-content-center">
    <a href="{{ route('dashboard.home') }}">
        <img src="{{ asset('assets/dashboard/img/common/logo-text.png') }}" height="50px">
    </a>
</div>

<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigasi</label>
    <div class="br-sideleft-menu">
        <a href="{{ route('dashboard.home') }}"
            class="br-menu-link {{ set_active([Request::is('dashboard/home'), Request::is('dashboard/home/')]) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Beranda</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        @if(auth()->user()->can('users_lihat') || auth()->user()->can('roles_lihat') ||
        auth()->user()->can('permissions_lihat'))
        <a href="javascript: void(0);"
            class="br-menu-link {{ set_active([Request::is('dashboard/users*'), Request::is('dashboard/roles*'), Request::is('dashboard/permissions*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-people tx-24"></i>
                <span class="menu-item-label">Manajemen User</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            @can('users_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.users.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/users*')) }}">Pengguna</a></li>
            @endcan
            @can('roles_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.roles.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/roles*')) }}">Peran</a></li>
            @endcan
            @can('permissions_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.permissions.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/permissions*')) }}">Hak Akses</a></li>
            @endcan
        </ul>
        @endif


        @if(auth()->user()->can('penghasilan_lihat') || auth()->user()->can('pekerjaan_lihat') || auth()->user()->can('pendidikan_lihat') || auth()->user()->can('agama_lihat') || auth()->user()->can('alamat_lihat') || auth()->user()->can('kondisibelajar') || auth()->user()->can('bcquran') || auth()->user()->can('waktutmph'))
        <a href="#" class="br-menu-link {{ set_active([Request::is('dashboard/penghasilan*'), Request::is('dashboard/pekerjaan*'), Request::is('dashboard/pendidikan*'), Request::is('dashboard/agama*'), Request::is('dashboard/alamat*'), Request::is('dashboard/kondisibelajar*'), Request::is('dashboard/bcquran*'), Request::is('dashboard/waktutmph*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-filing tx-24"></i>
                <span class="menu-item-label">Master Data</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            @can('penghasilan_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.penghasilan.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/penghasilan*')) }}">Data Penghasilan</a>
            </li>
            @endcan
            @can('pekerjaan_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.pekerjaan.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/pekerjaan*')) }}">Data Pekerjaan</a>
            </li>
            @endcan
            @can('pendidikan_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.pendidikan.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/pendidikan*')) }}">Data Pendidikan</a>
            </li>
            @endcan
            @can('agama_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.agama.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/agama*')) }}">Data Agama</a>
            </li>
            @endcan
            @can('alamat_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.alamat.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/alamat*')) }}">Data Tempat Tinggal</a>
            </li>
            @endcan
            @can('kondisibelajar_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.kondisibelajar.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/kondisibelajar*')) }}">Data Kondisi Belajar</a>
            </li>
            @endcan
            @can('bcquran_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.bcquran.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/bcquran*')) }}">Data Bacaan Quran</a>
            </li>
            @endcan
            @can('waktutmph_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.waktutmph.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/waktutmph*')) }}">Data Waktu Tempuh</a>
            </li>
            @endcan
        </ul>
        @endif

        {{-- manajement data VA --}}
        @if(auth()->user()->can('tkva_lihat') || auth()->user()->can('sdva_lihat') || auth()->user()->can('smpva_lihat') || auth()->user()->can('smava_lihat'))
        <a href="javascript: void(0);"
            class="br-menu-link {{ set_active([Request::is('dashboard/tkva*'), Request::is('dashboard/sdva*'), Request::is('dashboard/smpva*'), Request::is('dashboard/smava*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-people tx-24"></i>
                <span class="menu-item-label">Manajemen VA</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            @can('tkva_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.tkva.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/tkva*')) }}">VA TK</a></li>
            @endcan
            @can('sdva_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.sdva.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/sdva*')) }}">VA SD</a></li>
            @endcan
            @can('smpva_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.smpva.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/smpva*')) }}">VA SMP</a></li>
            @endcan
            @can('smava_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.smava.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/smava*')) }}">VA SMA</a></li>
            @endcan
        </ul>
        @endif
        {{-- close manajement data VA --}}


        <a href="javascript: void(0);" class="br-menu-link text-danger" data-toggle="modal" data-target="#logoutModal"">
            <div class=" br-menu-item">
            <i class="menu-item-icon icon ion-log-out tx-22"></i>
            <span class="menu-item-label">Logout</span>
    </div><!-- br-sideleft-menu -->
    <br>
</div><!-- br-sideleft -->
</div>
<!-- ########## END: LEFT PANEL ########## -->