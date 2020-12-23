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
        <a href="{{ route('dashboard.calonsiswa.profil', Auth::user()->id) }}"
            class="br-menu-link {{ set_active(Request::is('dashboard/calon-siswa/profil*')) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Profil Calon Siswa</span>
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
        <a href="#" class="br-menu-link {{ set_active([Request::is('dashboard/penghasilan*'), Request::is('dashboard/pekerjaan*'), Request::is('dashboard/pendidikan*'), Request::is('dashboard/agama*'), Request::is('dashboard/jarak*'), Request::is('dashboard/kondisibelajar*'), Request::is('dashboard/bcquran*'), Request::is('dashboard/waktutmph*')], 'active show-sub') }}">
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
            @can('jarak_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.jarak.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/jarak*')) }}">Data Jarak Tempat Tinggal</a>
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
        @if(auth()->user()->can('vatk_lihat') || auth()->user()->can('vasd_lihat') || auth()->user()->can('vasmp_lihat') || auth()->user()->can('vasma_lihat'))
        <a href="javascript: void(0);"
            class="br-menu-link {{ set_active([Request::is('dashboard/va/tk*'), Request::is('dashboard/va/sd*'), Request::is('dashboard/va/smp*'), Request::is('dashboard/va/sma*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-people tx-24"></i>
                <span class="menu-item-label">Virtual Account</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            @can('vatk_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.va.tk.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/va/tk*')) }}">VA TK</a></li>
            @endcan
            @can('vasd_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.va.sd.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/va/sd*')) }}">VA SD</a></li>
            @endcan
            @can('vasmp_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.va.smp.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/va/smp*')) }}">VA SMP</a></li>
            @endcan
            @can('vasma_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.va.sma.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/va/sma*')) }}">VA SMA</a></li>
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