<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <title>Register</title>
</head>

<body>
    <section style="background-color: #ffffff;">
        <div class="container p-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <!-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img3.webp" -->
                        <img src="https://primaindisoft.com/blog/wp-content/uploads/2019/09/olahragaa4.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Registration Info</h3>
                            @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                                <a href="{{ route('login') }}">Login</a>
                            </div>
                            @endif
                            <hr>
                            <form action="{{ route('post_register') }}" method="post" class="px-md-2">
                                @csrf
                                <input type="hidden" name="id_role" id="id_role" value="3">
                                <div class="form-group">
                                    <label class="form-label" for="label-name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="label-email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" />
                                </div>
                                <div class="form-group">
                                    <label id="password-field" class="form-label" for="label-nama">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password Minimal 8 Karakter" />
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <label id="re_pass-field" class="form-label" for="label-nama">Confirm Password</label>
                                    <input type="password" id="re_pass" name="re_pass" class="form-control" placeholder="Repeat Your Password" />
                                    <span toggle="#cpassword-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group mt-3">
                                    <label class="form-label" for="label-kec">Kecamatan</label>
                                    <select name="id_kecamatan" id="id_kecamatan" class="form-control">
                                        <option selected>-- Pilih Kecamatan --</option>
                                        @foreach($kecamatan as $key)
                                        <option value="{{ $key->nama_kecamatan }}" data-kode="{{ $key->nama_kecamatan }}">{{ $key->nama_kecamatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label id="code-field" class="form-label" for="label-code">Kode Kecamatan</label>
                                    <input type="text" id="kode_kecamatan" name="kode_kecamatan" class="form-control" placeholder="Kode Kecamatan" readonly />
                                    <span toggle="#kode_kecamatan-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success btn-md ">Submit</button>
                                </div>
                            </form>
                            <p class="text-center">Already have an account? <a href="{{ route('login') }}">Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script>
        var data = @json($data);

        document.getElementById('id_kecamatan').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var nama_kecamatan = selectedOption.getAttribute('data-kode');
            nama_kecamatan = nama_kecamatan.toUpperCase();

            var kode_kecamatan = '';

            for (var i = 0; i < data.length; i++) {
                if (data[i].name == nama_kecamatan) {
                    kode_kecamatan = data[i].id;
                    break;
                }
            }

            document.getElementById('kode_kecamatan').value = kode_kecamatan;
        });
    </script>
</body>

</html>