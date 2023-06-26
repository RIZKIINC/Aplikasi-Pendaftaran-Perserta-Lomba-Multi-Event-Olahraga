<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Multi Event</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('landing/css/styles.css') }}" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.png') }}">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{ asset('assets/template/images/logo_KONI.png') }}" />Multi Event</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                @if(Route::current()->getName() == 'login')
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                </ul>
                @else
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Berita</a></li>
                    <li class="nav-item"><a class="nav-link" href="#team">Developer</a></li>
                    @if(auth()->check() && auth()->user()->id_role == '1')
                    <li class="nav-item"><a class="nav-link" href="/dashboard/admin">Dashboard</a></li>
                    @elseif(auth()->check() && auth()->user()->id_role == '2')
                    <li class="nav-item"><a class="nav-link" href="/dashboard/ketupel">Dashboard</a></li>
                    @elseif(auth()->check() && auth()->user()->id_role == '3')
                    <li class="nav-item"><a class="nav-link" href="/dashboard/camat">Dashboard</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="/login"><i class="fas fa-sign-in"></i> Login</a></li>
                    @endif
                </ul>
                @endif
            </div>
        </div>
    </nav>
    @yield('content')
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Multi Event 2023</div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('landing/js/scripts.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    @stack('scripts')
</body>

</html>