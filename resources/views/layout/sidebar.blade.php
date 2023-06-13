<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ URL::to('home') }}">MULTI EVENT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">M E N U</li>
            @switch(Auth::user())
                @case(Auth::user()->id_role === 1)
                <li><a class="nav-link" href="{{ URL::to('admin') }}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i> <span>Data Master</span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="{{ URL::to('admin') }}">Admin</a></li>
                        <li><a class="nav-link" href="{{ URL::to('sport/index') }}">Sport</a></li>
                        <li><a class="nav-link" href="{{ URL::to('mapdistrictsport/create') }}">Pendaftaran</a></li>
                        <li><a class="nav-link" href="{{ URL::to('camat') }}">Camat</a></li>
                        <li><a class="nav-link" href="{{ URL::to('participant') }}">Peserta</a></li>
                    </ul>
                </li>
                <li><a class="nav-link" href="{{ URL::to('') }}"><i class="fab fa-readme"></i> <span>Verifikasi Pendaftaran</span></a></li>
                @break

                @case(Auth::user()->id_role === 3)
                <li><a class="nav-link" href="{{ URL::to('camat') }}"><i class="fas fa-home"></i><span>Dashboard</span></a></li>
                <li><a class="nav-link" href="{{ URL::to('mapdistrictsport/index') }}"><i class="fas fa-home"></i><span>Pendaftaran</span></a></li>
                @break
            @endswitch
                <li><a class="nav-link" href="{{ URL::to('logout') }}"><i class="fa fa-power-off"></i><span>Logout</span></a></li>
        </ul>
    </aside>
</div>
