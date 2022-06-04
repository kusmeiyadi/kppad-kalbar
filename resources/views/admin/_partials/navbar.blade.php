<div id="app">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <pengaduan v-bind:pengaduans="pengaduans"></pengaduan>
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    @if (Auth::user()->path == NULL)
                    <img class="user-image img-circle elevation-2"
                        src="{{ asset('AdminLTE-3.0.2/dist/img/profile/user-default-160x160.png') }}" alt="User Image">
                    @else
                    <img class="user-image img-circle elevation-2" src="{{ asset(Auth::user()->path) }}"
                        alt="User Image">
                    @endif
                    <span class="d-none d-md-inline">{{Auth::user()->name}}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <li class="user-header bg-primary">
                        @if (Auth::user()->path == NULL)
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ asset('AdminLTE-3.0.2/dist/img/profile/user-default-160x160.png') }}"
                            alt="User profile picture">
                        @else
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset(Auth::user()->path) }}"
                            alt="User profile picture">
                        @endif
                        <p>
                            {{Auth::user()->name}} - @foreach (Auth::user()->getRoleNames() as $role)
                            {{ $role }}
                            @endforeach
                            {{-- <small>Member since Nov. 2012</small> --}}
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="{{ route('profil') }}" class="btn btn-default btn-flat btn-sm">Profil</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                            class="btn btn-default btn-flat float-right btn-sm">Log Out
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>