<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetim</title>
    <!-- Bootstrap 5 CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Google Poppins Font CDN Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box - sizing: border - box;
        }

        /* Variables */
        : root {
            --primary - font - family: 'Poppins', sans - serif;
            --light - white: #f5f8fa;
            --gray: #5e6278;
            --gray-1: # e3e3e3;
        }

        body {
            font - family: var (--primary - font - family);
            font - size: 14 px;
        }

        /* google  */



        .login-with-google-btn {
            transition: background-color 0.3s, box-shadow 0.3s;

            width: 100%;
            padding: 12px 16px 12px 42px;
            border: none;
            border-radius: 3px;
            box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 1px 1px rgba(0, 0, 0, 0.25);

            color: black;
            font-size: 14px;
            font-weight: 500;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
                Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;

            background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTgiIGhlaWdodD0iMTgiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj48cGF0aCBkPSJNMTcuNiA5LjJsLS4xLTEuOEg5djMuNGg0LjhDMTMuNiAxMiAxMyAxMyAxMiAxMy42djIuMmgzYTguOCA4LjggMCAwIDAgMi42LTYuNnoiIGZpbGw9IiM0Mjg1RjQiIGZpbGwtcnVsZT0ibm9uemVybyIvPjxwYXRoIGQ9Ik05IDE4YzIuNCAwIDQuNS0uOCA2LTIuMmwtMy0yLjJhNS40IDUuNCAwIDAgMS04LTIuOUgxVjEzYTkgOSAwIDAgMCA4IDV6IiBmaWxsPSIjMzRBODUzIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNNCAxMC43YTUuNCA1LjQgMCAwIDEgMC0zLjRWNUgxYTkgOSAwIDAgMCAwIDhsMy0yLjN6IiBmaWxsPSIjRkJCQzA1IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBkPSJNOSAzLjZjMS4zIDAgMi41LjQgMy40IDEuM0wxNSAyLjNBOSA5IDAgMCAwIDEgNWwzIDIuNGE1LjQgNS40IDAgMCAxIDUtMy43eiIgZmlsbD0iI0VBNDMzNSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTAgMGgxOHYxOEgweiIvPjwvZz48L3N2Zz4=);
            background-color: white;
            background-repeat: no-repeat;
            background-position: 12px 11px;

            &:hover {
                box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25);
            }

            &:active {
                background-color: #eeeeee;
            }

            &:focus {
                outline: none;
                box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 2px 4px rgba(0, 0, 0, 0.25),
                    0 0 0 3px #c8dafc;
            }

            &:disabled {

                filter: grayscale(100%);
                background-color: #ebebeb;
                box-shadow: 0 -1px 0 rgba(0, 0, 0, 0.04), 0 1px 1px rgba(0, 0, 0, 0.25);
                cursor: not-allowed;
            }
        }
    </style>

</head>

<body>
    <section class="wrapper">
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <div class="logo">
                    <br>
                    <img style="border-radius: 50%;" decoding="async" src="{{ asset('logo.jpg') }}" class="img-fluid"
                        alt="Logo"><br>
                </div>
                <form action="{{ route('admin.logincontrol') }}" method="post"
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

                            <div style="padding: 10;text-align: left;" class="col-12">
                                <input name="beni_hatirla" {{ old('beni_hatirla') ? 'checked' : '' }} type="checkbox"
                                    id="remember">
                                <label style="color: black; background: transparent;" for="remember">
                                    Hatırla Beni
                                </label>
                            </div>

                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Giriş Yap</button>

                </form>
            </div>
        </div>
    </section>


</body>

</html>
