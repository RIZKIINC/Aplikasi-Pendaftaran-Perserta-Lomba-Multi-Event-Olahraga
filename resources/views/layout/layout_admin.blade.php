<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    @include('layout/css_global')
    @yield('custom_css')
</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            {{-- Navbar --}}
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto"></form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{ URL::to('logout') }}" class="dropdown-item has-icon text-danger">
                                    <i class="fas fa-sign-out-alt"></i><b>LOG OUT</b>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>

            {{-- Sidebar --}}
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img src="{{ asset('assets/template/images/logo_KONI.png') }}" alt="" width="35px">
                        <a href="{{ URL::to('/') }}">MULTI EVENT</a>
                    </div>
                    <ul class="sidebar-menu">
                        <br>
                        <li class="menu-header">M E N U</li>
                        <li><a class="nav-link" href="{{ URL::to('dashboard/admin') }}"><i class="fas fa-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-archive"></i> <span>Data
                                    Master</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ URL::to('adminlist') }}">Admin</a></li>
                                <li><a class="nav-link" href="{{ URL::to('user') }}">Data User</a></li>
                                <li><a class="nav-link" href="{{ URL::to('sport/index') }}">Cabang Olahraga</a></li>
                                <li><a class="nav-link" href="{{ URL::to('camatlist') }}">Camat</a></li>
                                <li><a class="nav-link" href="{{ URL::to('/participantlist') }}">Peserta</a></li>
                                <li><a class="nav-link" href="{{ URL::to('event/index') }}">Kegiatan</a></li>
                                <li><a class="nav-link" href="{{ URL::to('news/index') }}">Berita</a></li>
                                <li><a class="nav-link" href="{{ URL::to('team/index') }}">Pengurus</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ URL::to('/verifkasi-pendaftaran/index') }}"><i class="fab fa-readme"></i> <span>Verifikasi
                                Pendaftaran</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ URL::to('logout') }}"><i class="fa fa-power-off"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul>
                </aside>
            </div>

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; 2023 <div class="bullet"></div>
                    <a href="">LOMBA PEKAN OLAHRAGA KOTA PALEMBANG - MULTI EVENT</a>
            </div>

        </footer>

        </div>
    </div>

    @include('layout/js_global')
    @yield('script')
    @yield('custom_script')
</body>
</html>
