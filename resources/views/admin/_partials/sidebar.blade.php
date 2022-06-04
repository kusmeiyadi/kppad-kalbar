<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{ asset('AdminLTE-3.0.2/dist/img/KPPADKalbarLogo.png') }}" alt="KPPAD Kalbar Logo"
            class="brand-image">
        <span class="brand-text font-weight-light">KPPAD Kalbar</span>
    </a>
    <div class="sidebar">
        @role('Ketua Komisioner|Wakil Ketua Komisioner|Staf|Komisioner')
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-child-indent nav-compact"
                data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('admin.dashboard')) ? 'active' : '' }}"
                        href="{{ route('admin.dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('lihat jenis kasus')
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('jenis-kasus.index')) ? 'active' : '' }}"
                        href="{{ route('jenis-kasus.index') }}">
                        <i class="nav-icon fas fa-fw fa-scroll"></i>
                        <p>Jenis Kasus</p>
                    </a>
                </li>
                @endcan
                <li
                    class="nav-item has-treeview {{ (request()->routeIs('pengaduan-masuk.index','pengaduan.accepted','pengaduan.rejected','pengaduan.finish')) ? 'menu-open' : '' }}">
                    <a href="#"
                        class="nav-link {{ (request()->routeIs('pengaduan-masuk.index','pengaduan.accepted','pengaduan.rejected','pengaduan.finish')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-edit"></i>
                        <p>Pengaduan<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('pengaduan-masuk.index') }}"
                                class="nav-link {{ (request()->routeIs('pengaduan-masuk.index')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Masuk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pengaduan.accepted') }}"
                                class="nav-link {{ (request()->routeIs('pengaduan.accepted')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-navy"></i>
                                <p>Konfirmasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pengaduan.rejected') }}"
                                class="nav-link {{ (request()->routeIs('pengaduan.rejected')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-danger"></i>
                                <p>Tolak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pengaduan.finish') }}"
                                class="nav-link {{ (request()->routeIs('pengaduan.finish')) ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kegiatan.index') }}"
                        class="nav-link {{ (request()->routeIs('kegiatan.index')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>Jadwal Kegiatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('activity-log.index') }}"
                        class="nav-link {{ (request()->routeIs('activity-log.index')) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-fw fa-list"></i>
                        <p>Log Aktivitas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('regulasi.index') }}"
                        class="nav-link {{ (request()->routeIs('regulasi.index')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-file-pdf"></i>
                        <p>Regulasi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('hubungi-kami.index') }}"
                        class="nav-link {{ (request()->routeIs('hubungi-kami.index')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-address-book"></i>
                        <p>Hubungi Kami</p>
                    </a>
                </li>
                @can('lihat pengguna')
                <li class="nav-header">PENGGUNA</li>
                <li class="nav-item {{ (request()->routeIs('user.index')) ? 'active' : '' }}">
                    <a class="nav-link {{ (request()->routeIs('user.index')) ? 'active' : '' }}"
                        href="{{ route('user.index') }}">
                        <i class="nav-icon fas fa-fw fa-users"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('user.roles_permission')) ? 'active' : '' }}"
                        href="{{ route('user.roles_permission') }}">
                        <i class="nav-icon fas fa-fw fa-user-tag"></i>
                        <p>Perizinan Peran</p>
                    </a>
                </li>
                <li class="nav-item {{ (request()->routeIs('roles.index')) ? 'active' : '' }}">
                    <a class="nav-link {{ (request()->routeIs('roles.index')) ? 'active' : '' }}"
                        href="{{ route('roles.index') }}">
                        <i class="nav-icon fas fa-fw fa-user-tag"></i>
                        <p>Peran</p>
                    </a>
                </li>
                @endcan
                <li class="nav-header">PENCADANGAN</li>
                <li class="nav-item">
                    <a href="{{ route('backupdata.index') }}"
                        class="nav-link {{ (request()->routeIs('backupdata.index')) ? 'active' : '' }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>Cadangkan Data</p>
                    </a>
                </li>
            </ul>
        </nav>
        @endrole
    </div>
</aside>