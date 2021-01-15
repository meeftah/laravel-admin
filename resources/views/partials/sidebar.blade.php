<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo justify-content-center">
    <a href="{{ route('dashboard.home') }}">
        <img src="{{ asset('assets/common/logo-text.png') }}" height="50px">
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

        {{-- Profil Calon Siswa --}}
        @hasanyrole('Calon Siswa TK|Calon Siswa SD|Calon Siswa SMP|Calon Siswa SMA')
        @if (auth()->user()->getStatusCasisKu() != config('ppdb.status.calon_siswa.terdaftar') &&
        auth()->user()->getStatusCasisKu() != config('ppdb.status.calon_siswa.nonaktif') &&
        auth()->user()->getStatusCasisKu() != config('ppdb.status.calon_siswa.datalengkap'))
        <a href="{{ route('dashboard.calonsiswa.profil') }}"
            class="br-menu-link {{ set_active(Request::is('dashboard/calon-siswa/profil*')) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-person tx-22"></i>
                <span class="menu-item-label">Profil Calon Siswa</span>
            </div>
        </a>
        @endif
        @endhasanyrole

        {{-- Manajement User --}}
        @if(auth()->user()->can('users_lihat') || auth()->user()->can('roles_lihat') ||
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

        {{-- Data Calon Siswa --}}
        @if(auth()->user()->can('casistk_lihat') || auth()->user()->can('casissd_lihat') ||
        auth()->user()->can('casissmp_lihat') || auth()->user()->can('casissma_lihat'))
        <a href="javascript: void(0);"
            class="br-menu-link {{ set_active([Request::is('dashboard/calon-siswa/tk*'), Request::is('dashboard/calon-siswa/sd*'),
            Request::is('dashboard/calon-siswa/smp*'), Request::is('dashboard/calon-siswa/sma*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-people tx-24"></i>
                <span class="menu-item-label">Data Calon Siswa</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            @can('casistk_lihat')
            <li class="nav-item">
                <a href="{{ route('dashboard.calon-siswa.tk.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/calon-siswa/tk*')) }}">
                    TK
                </a>
            </li>
            @endcan
            @can('casissd_lihat')
            <li class="nav-item">
                <a href="{{ route('dashboard.calon-siswa.sd.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/calon-siswa/sd*')) }}">
                    SD
                </a>
            </li>
            @endcan
            @can('casissmp_lihat')
            <li class="nav-item">
                <a href="{{ route('dashboard.calon-siswa.smp.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/calon-siswa/smp*')) }}">
                    SMP
                </a>
            </li>
            @endcan
            @can('casissma_lihat')
            <li class="nav-item">
                <a href="{{ route('dashboard.calon-siswa.sma.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/calon-siswa/sma*')) }}">
                    SMA
                </a>
            </li>
            @endcan
        </ul>
        @endif

        {{-- Data Master --}}
        @if(auth()->user()->can('penghasilan_lihat') || auth()->user()->can('pekerjaan_lihat') ||
        auth()->user()->can('pendidikan_lihat') || auth()->user()->can('agama_lihat') ||
        auth()->user()->can('alamat_lihat') || auth()->user()->can('kondisibelajar') ||
        auth()->user()->can('bcquran') || auth()->user()->can('waktutmph') ||
        auth()->user()->can('jenisdokumen') || auth()->user()->can('transportasi') ||
        auth()->user()->can('tempattinggal'))
        <a href="#"
            class="br-menu-link {{ set_active([Request::is('dashboard/penghasilan*'), Request::is('dashboard/pekerjaan*'), Request::is('dashboard/pendidikan*'), Request::is('dashboard/agama*'), Request::is('dashboard/jarak*'), Request::is('dashboard/kondisibelajar*'), Request::is('dashboard/bcquran*'), Request::is('dashboard/waktutmph*'), Request::is('dashboard/jenisdokumen*'), Request::is('dashboard/transportasi*'), Request::is('dashboard/tempattinggal*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-filing tx-24"></i>
                <span class="menu-item-label">Data Master</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            @can('penghasilan_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.penghasilan.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/penghasilan*')) }}">Data
                    Penghasilan</a>
            </li>
            @endcan
            @can('pekerjaan_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.pekerjaan.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/pekerjaan*')) }}">Data
                    Pekerjaan</a>
            </li>
            @endcan
            @can('pendidikan_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.pendidikan.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/pendidikan*')) }}">Data
                    Pendidikan</a>
            </li>
            @endcan
            @can('agama_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.agama.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/agama*')) }}">Data
                    Agama</a>
            </li>
            @endcan
            @can('jarak_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.jarak.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/jarak*')) }}">Data Jarak
                    Tempat Tinggal</a>
            </li>
            @endcan
            @can('kondisibelajar_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.kondisibelajar.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/kondisibelajar*')) }}">Data
                    Kondisi Belajar</a>
            </li>
            @endcan
            @can('bcquran_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.bcquran.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/bcquran*')) }}">Data Bacaan
                    Quran</a>
            </li>
            @endcan
            @can('waktutmph_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.waktutmph.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/waktutmph*')) }}">Data
                    Waktu Tempuh</a>
            </li>
            @endcan
            @can('jenisdokumen_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.jenisdokumen.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/jenisdokumen*')) }}">Data
                    Jenis Dokumen</a>
            </li>
            @endcan
            @can('transportasi_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.transportasi.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/transportasi*')) }}">Data
                    Trasportasi</a>
            </li>
            @endcan
            @can('tempattinggal_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.tempattinggal.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/tempattinggal*')) }}">Data
                    Tempat Tinggal</a>
            </li>
            @endcan
            {{-- @can('slidefrontend_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.slidefrontend.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/slidefrontend*')) }}">Data
                    Gambar Slide</a>
            </li>
            @endcan --}}
        </ul>
        @endif

        {{-- Virtual Account --}}
        @if(auth()->user()->can('vatk_lihat') || auth()->user()->can('vasd_lihat') ||
        auth()->user()->can('vasmp_lihat') || auth()->user()->can('vasma_lihat'))
        <a href="javascript: void(0);"
            class="br-menu-link {{ set_active([Request::is('dashboard/va/tk*'), Request::is('dashboard/va/sd*'), Request::is('dashboard/va/smp*'), Request::is('dashboard/va/sma*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-people tx-24"></i>
                <span class="menu-item-label">Virtual Account</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            @can('vatk_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.va.tk.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/va/tk*')) }}">VA TK</a>
            </li>
            @endcan
            @can('vasd_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.va.sd.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/va/sd*')) }}">VA SD</a>
            </li>
            @endcan
            @can('vasmp_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.va.smp.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/va/smp*')) }}">VA SMP</a>
            </li>
            @endcan
            @can('vasma_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.va.sma.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/va/sma*')) }}">VA SMA</a>
            </li>
            @endcan
        </ul>
        @endif

        {{-- Data Website --}}
        @if(auth()->user()->can('slidefrontend_lihat'))
        <a href="#" class="br-menu-link {{ set_active([Request::is('dashboard/slidefrontend*')], 'active show-sub') }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-world tx-24"></i>
                <span class="menu-item-label">Data Website</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div>
        </a>
        <ul class="br-menu-sub nav flex-column">
            @can('slidefrontend_lihat')
            <li class="nav-item"><a href="{{ route('dashboard.slidefrontend.index') }}"
                    class="nav-link {{ set_active(Request::is('dashboard/slidefrontend*')) }}">Data
                    Slide</a>
            </li>
            @endcan
        </ul>
        @endif

        {{-- Pengaturan --}}
        @role('superadmin')
        <a href="{{ route('dashboard.pengaturan.index', Auth::user()->id) }}"
            class="br-menu-link {{ set_active(Request::is('dashboard/pengaturan*')) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-gear tx-22"></i>
                <span class="menu-item-label">Pengaturan</span>
            </div>
        </a>
        @endrole

        {{-- Logout --}}
        <a href="javascript: void(0);" class="br-menu-link text-danger" data-toggle="modal" data-target="#logoutModal">
            <div class=" br-menu-item">
                <i class="menu-item-icon icon ion-log-out tx-22"></i>
                <span class="menu-item-label">Logout</span>
            </div><!-- br-sideleft-menu -->
        </a>
    </div><!-- br-sideleft -->
</div>