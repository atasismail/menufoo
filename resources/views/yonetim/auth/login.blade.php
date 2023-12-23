<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetim</title>
    <!-- Bootstrap 5 CDN Link -->
    <link rel="stylesheet" href="{{ asset('cdn/css/core.min.css') }}">
    <link rel="stylesheet" href="{{ asset('cdn/css/login.css') }}">

</head>

<body>
    <section class="wrapper">
        <div style="margin: 15vh auto;" class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">

                </div>
                <form action="{{ route('yonetim.logincontrol') }}" method="post"
                    class="rounded bg-white shadow py-5 px-4">
                    @csrf
                    <div class="logo">
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @elseif(Session::has('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Yönetim Giriş</h3>
                    <div class="fw-normal text-muted mb-4"> Hesabınız Yoksa
                        <a href="{{ route('yonetim.kayit') }}" class="text-primary fw-bold text-decoration-none">Kayıt
                            Olun</a>
                        <br>
                        <b>veya direk Google ile giriş Yapınız</b>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Şifre"
                            name="password" required>
                        <label for="floatingPassword">şifre</label>
                    </div>

                    <div class="form-field">
                        <br>
                        <div class="row">

                            <div style="padding: 0;" class="col-4">
                                <input name="beni_hatirla" {{ old('beni_hatirla') ? 'checked' : '' }} type="checkbox"
                                    id="remember">
                                <label style="color: black; background: transparent;" for="remember">
                                    Hatırla Beni
                                </label>
                            </div>
                            <div class="col-8">
                                <a href="{{ route('yonetim.sifirla') }}"
                                    class="text-primary fw-bold text-decoration-none">Şifrenizi Unuttunuz
                                    mu?</a>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Giriş Yap</button>
                    <div class="text-center text-muted text-uppercase mb-3">Veya</div>
                    <div class="form-field">

                        <a style="width: 100%" href="{{ route('googele-auth') }}">
                            <button type="button" class="login-with-google-btn">

                                Google ile Giriş yap

                            </button>
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
