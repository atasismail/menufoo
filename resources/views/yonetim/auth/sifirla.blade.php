<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Forget Password Form Using Bootstrap 5</title>
    <link rel="stylesheet" href="{{ asset('cdn/css/core.min.css') }}">

    <!-- Custom CSS Link -->
    <style>
        /* Google Poppins Font CDN Link */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Variables */
        :root {
            --primary-font-family: 'Poppins', sans-serif;
            --light-white: #f5f8fa;
            --gray: #5e6278;
            --gray-1: #e3e3e3;
        }

        body {
            font-family: var(--primary-font-family);
            font-size: 14px;
        }

        /* Main CSS OTP Verification New Changing */
        .wrapper {
            padding: 0 0 100px;
            background-image: url("images/bg.png");
            background-position: bottom center;
            background-repeat: no-repeat;
            background-size: contain;
            background-attachment: fixed;
            min-height: 100%;
            /* height:100vh;
    display:flex;
    align-items:center;
    justify-content:center; */
        }
    </style>
</head>

<body>
    <section class="wrapper">
        <div style="margin: 15vh auto;" class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">

                <form class="rounded bg-white shadow p-5">
                    <h3 class="text-dark fw-bolder fs-4 mb-2"> Şifre Sıfırlama</h3>

                    <div class="fw-normal text-muted mb-4">

                        şifrenizi sıfırlamak için e-postanızı girin.
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email</label>
                    </div>

                    <button type="submit" class="btn btn-primary submit_btn my-4">Sıfırla</button>
                    <a href="{{ route('yonetim.login') }}"><button type="button"
                            class="btn btn-secondary submit_btn my-4 ms-3">İptal</button></a>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
