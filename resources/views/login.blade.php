 @extends('landing.layouts.master')
 <style>
     #mainNav {
         padding-top: 1rem !important;
         padding-bottom: 1rem !important;
         background-color: #212529 !important;
     }

     #mainNav .navbar-nav .nav-item .nav-link {
         font-family: "Montserrat", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji" !important;
         font-size: 0.95rem !important;
         color: black !important;
         letter-spacing: 0.0625em !important;
     }
 </style>
 <!-- Font Icon -->
 <link rel="stylesheet" href="{{ asset('assets/template/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="{{ asset('favicon.png') }}">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Sign Up</title>
     <!-- Main css -->
     <link rel="stylesheet" href="{{ asset('assets/template/css/style.css') }}">
     @section('content')

     <div class="main">
         <!-- Sing in  Form -->
         <section class="signin">
             <div class="container">
                 <div class="signin-content">
                     <div class="signin-image">
                         <figure><img src="{{ asset('assets/template/images/logo_KONI.png') }}" alt="sing in image"></figure>
                     </div>
                     <div class="signin-form">
                         <h2 class="form-title">Sign in</h2>
                         @if(Session::has('message'))
                         <div class="alert alert-success">
                             {{ Session::get('message') }}
                         </div>
                         @endif
                         @if (Session::has('error'))
                         <div class="alert alert-danger alert-dismissible show fade mx-4">
                             <div class="alert-body">
                                 <a style="color: red;">{{ Session::get('error') }}</a>
                             </div>
                         </div>
                         @endif
                         <form action="{{ route('post_login') }}" method="POST" class="login-form" id="login-form">
                             @csrf
                             <div class="form-group">
                                 <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                 <input type="text" name="email" id="email" placeholder="Your Email" />
                             </div>
                             <div class="form-group">
                                 <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                 <input type="password" name="password" id="password" placeholder="Password" />
                             </div>
                             <div class="form-group">
                                 <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                 <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                             </div>
                             <div class="form-group">
                                 <a href="{{ route('register') }}" class="signin-image-link">Create an account</a>
                             </div>
                             <div class="form-group form-button">
                                 <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                             </div>
                         </form>
                         <a href="/">Go to home</a>
                     </div>
                 </div>
             </div>
         </section>
     </div>
     @endsection
     @push('scripts')
     @endpush