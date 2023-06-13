
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('assets/template/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('assets/template/css/style.css') }}">
</head>
<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form action="{{ route('post_register') }}" method="POST" class="register-form" id="register-form">
                            @csrf
                            <input type="hidden" name="id_role" id="id_role" value="3">

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                {{-- <label for="id_kec"><i class="zmdi zmdi-lock"></i></label> --}}
                                {{-- <input type="text" name="id_kecamatan" id="id_kecamatan" placeholder="Id"/> --}}
                                <select name="id_kecamatan" class="form-control @error('id_kecamatan') is-invalid @enderror" required value="{{ old('id_kecamatan') }}">
                                    <option value="" disabled selected>Pilih Kecamatan</option>
                                        @foreach($kecamatan as $key)
                                            <option value="{{ $key->id_kecamatan }}">{{ $key->nama_kecamatan }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kode_kec"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="text" name="kode_kecamatan" id="kode_kecamatan" placeholder="Kode Kecamatan"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{ asset('assets/template/images/signup-image.jpg') }}" alt="sing up image"></figure>
                        <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- JS -->
    <script src="{{ asset('assets/template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/template/js/main.js') }}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
