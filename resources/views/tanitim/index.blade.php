<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Menufoo</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />

    <link href="{{ asset('cdn/css/tanitim.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('cdn/css/core.min.css') }}">

    <style>
        @import url('https://menufoo.site/cdn/temalar/1/font/euclid-circular-a.css');

        * {
            text-decoration: none;

            font-family: "Euclid Circular A", sans-serif !important;
        }

        .whatsapp-button {
            display: inline-flex;
            justify-content: flex-start;
            align-items: center;
            padding: 12px 20px;
            background: #25D366;
            text-align: left;
            text-decoration: none;
            font-family: sans-serif;
            font-size: 16px;
            line-height: 20px;
            border-radius: 12px;
            box-shadow: rgba(255, 255, 255, 0.25) 0 0 0 3px inset;
            transition: 0.3s ease-out;

        }

        .whatsapp-button,
        .whatsapp-button:hover,
        .whatsapp-button:focus,
        .whatsapp-button:active {
            color: #fff;
            text-decoration: none;
        }

        .whatsapp-button:hover,
        .whatsapp-button:focus {
            background: #22bf5b;
        }

        .whatsapp-button:focus {
            outline: none;
        }

        .whatsapp-button:active {
            background: #1ea951;
            transition: none;
        }

        .whatsapp-button p {
            margin: 0;
        }

        .whatsapp-button span {
            display: block;
            font-size: 14px;
            line-height: 18px;
        }

        .whatsapp-button strong {
            display: block;
            font-weight: 700;
        }

        .whatsapp-button svg {
            width: 36px;
            height: 36px;
            fill: currentcolor;
            flex-shrink: 0;
            margin-right: 8px;
        }

        .youtube-button {
            display: inline-block;
            padding: 15px 25px;
            background-color: #ff0000;
            /* Kırmızı renk */
            border: none;
            border-radius: 8px;
            /* Yuvarlak köşe */
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Hafif gölge */
        }

        .youtube-logo {
            font-size: 25px;
            color: #ffffff;
            /* Beyaz renk */
            font-weight: bold;
        }

        .youtube-logo::before {
            content: "\f167";
            /* YouTube logosunu Unicode karakteri ile ekliyoruz (Font Awesome kullanarak) */
            font-family: 'Font Awesome 5 Brands';
            /* Font Awesome Brands fontunu ekliyoruz */
            margin-right: 10px;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-family: 'Kanit', sans-serif;
            font-weight: bold;
            color: #ff0000;
            font-size: 24px;
            font-size: 24px;
        }

        .navbar-toggler-icon {
            background-color: #007bff;
        }

        .navbar-nav .nav-link {
            color: #495057;
        }

        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="#page-top">Menufoo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

                <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-lg-3" href="#features">Özellikler</a>
                    </li>
                    <button class="btn btn-success rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal"
                        data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <span class="small">Whatsapp ile İletişime Geçin</span>
                        </span>
                    </button>

                </ul>


                <a href="{{ route('yonetim.login') }}" class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0">
                    <span class="d-flex align-items-center">
                        <i class="bi bi-box-arrow-in-right me-2"></i>
                        <span class="small">Giriş</span>
                    </span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Mashead header-->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-sm-12 col-md-6 col-lg-8">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3">
                            <!-- Menufoo Sanal Garson. -->
                            15 Gün Ücretsiz Deneme
                        </h1>
                        <p class="lead fw-normal text-muted mb-5">
                            İşlerinizi en az %30 artıracak Menufoo Sanal Garsona Geçiş Yapınız
                        </p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <a class="whatsapp-button" href="https://wa.me/15551234567?text=Hello%20World"
                                target="_blank">
                                <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="M.057,22,1.6,16.351a10.9,10.9,0,1,1,4.233,4.133L.057,22ZM6.1,18.51A9.04,9.04,0,1,0,3.59,16.066L2.674,19.41l3.43-.9ZM16.542,13.5c-.068-.114-.249-.182-.522-.318s-1.612-.8-1.862-.886-.431-.137-.613.137-.7.886-.863,1.068-.318.2-.59.068A7.435,7.435,0,0,1,9.9,12.217,8.2,8.2,0,0,1,8.386,10.33c-.159-.272-.017-.42.119-.556s.272-.318.409-.478a1.787,1.787,0,0,0,.275-.454.5.5,0,0,0-.023-.478c-.069-.136-.613-1.477-.84-2.022s-.446-.459-.613-.468l-.523-.009a1,1,0,0,0-.726.341A3.057,3.057,0,0,0,5.511,8.48,5.3,5.3,0,0,0,6.623,11.3a12.145,12.145,0,0,0,4.653,4.113,15.762,15.762,0,0,0,1.553.574,3.744,3.744,0,0,0,1.716.108,2.806,2.806,0,0,0,1.839-1.3,2.269,2.269,0,0,0,.159-1.3Z" />
                                </svg>
                                <p>
                                    <strong>WhatsApp</strong>
                                    <span>Üzerinden Hemen Ulaşın</span>
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <!-- Masthead device mockup feature-->
                    <div class="masthead-device-mockup">
                        <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                    <stop class="gradient-start-color" offset="0%"></stop>
                                    <stop class="gradient-end-color" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(120.42 -49.88) rotate(45)"></rect>
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(-49.88 120.42) rotate(-45)"></rect>
                        </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg>
                        <div class="device-wrapper" style="max-width: 100%;">
                            <div class="device" data-device="iPhoneX" data-orientation="portrait"
                                data-color="black">
                                <div class="screen bg-black">

                                    <video muted="muted" autoplay="" loop=""
                                        style="max-width: 100%; height: 100%; object-fit: cover;">
                                        <source src="{{ asset('cdn/images/tanitim/demo-screen.mp4') }}"
                                            type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Quote/testimonial aside-->
    <aside class="text-center bg-gradient-primary-to-secondary">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-1 text-white mb-4">
                        "Bir Müşteri Olarak Beklemek İstemem Böyle Bir Uygulama Beni Mutlu Eder"
                    </div>

                </div>
            </div>
        </div>
    </aside>
    <!-- App features section-->
    <section id="features">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-8 order-lg-1 mb-5 mb-lg-0">
                    <div class="container-fluid px-5">
                        <div class="row gx-5">
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-phone-fill icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">16 Renk Seçeneği</h3>
                                    <p class="text-muted mb-0">
                                        Sizlere Vereceğimiz Admin Panel ile Renk Değiştirebilirsiniz
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6 mb-5">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-telegram icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Telegram Entegreli</h3>
                                    <p class="text-muted mb-0">
                                        Admin Panelden Garson Ekleme Bölümünden Garson Ekleyip Sipariş Almasını
                                        Sağlayabilirsiniz
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-5 mb-md-0">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-ui-checks icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">Kullanıcı Dostu</h3>
                                    <p class="text-muted mb-0">
                                        Son Derece Sade Ve kullanımı Kolay tasarımla Müşteri Kitlenizi Artırabilirsiniz
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Feature item-->
                                <div class="text-center">
                                    <i class="bi-patch-check-fill icon-feature text-gradient d-block mb-3"></i>
                                    <h3 class="font-alt">15 Gün Deneme Ücretsiz</h3>
                                    <p class="text-muted mb-0">
                                        15gün Ücretsiz Deneme Avantajı ile sistemi inceleme Fırsatı elde edebilirsiniz
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-lg-0">
                    <!-- Features section device mockup-->
                    <div class="features-device-mockup">
                        <svg class="circle" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <defs>
                                <linearGradient id="circleGradient" gradientTransform="rotate(45)">
                                    <stop class="gradient-start-color" offset="0%"></stop>
                                    <stop class="gradient-end-color" offset="100%"></stop>
                                </linearGradient>
                            </defs>
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg><svg class="shape-1 d-none d-sm-block" viewBox="0 0 240.83 240.83"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(120.42 -49.88) rotate(45)"></rect>
                            <rect x="-32.54" y="78.39" width="305.92" height="84.05" rx="42.03"
                                transform="translate(-49.88 120.42) rotate(-45)"></rect>
                        </svg><svg class="shape-2 d-none d-sm-block" viewBox="0 0 100 100"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50"></circle>
                        </svg>
                        <div class="device-wrapper" style="max-width: 100%;">
                            <div class="device" data-device="iPhoneX" data-orientation="portrait"
                                data-color="black">
                                <div class="screen bg-black">
                                    <video muted="muted" autoplay="" loop=""
                                        style="max-width: 100%; height: 100%; object-fit: cover;">
                                        <source src="{{ asset('cdn/images/tanitim/demo-screen.mp4') }}"
                                            type="video/mp4" />
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic features section-->
    <section class="bg-light">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                <div class="col-12 col-lg-5">
                    <h2 class="display-4 lh-1 mb-4">Admin Panelden</h2>
                    <p class="lead fw-normal text-muted mb-5 mb-lg-0">
                        * Kategori Ekleyebilirsiniz
                        <br>
                        * Ürün Ekleyebilirsiniz
                        <br>
                        * Fiyatları Kolaylıkla Güncelleyebileceksiniz
                        <br>
                        * Garson Bildirim Ayarlamaları Yapabileceksiniz
                        <br>
                        * Tema Seçeneklerinden 16 Ayrı Renk ve Optimizasyonları Ayarlayabieceksiniz
                        <br>
                        <br>
                    <div class="d-flex flex-column flex-lg-row align-items-center">
                        <a class="whatsapp-button" href="https://wa.me/15551234567?text=Hello%20World"
                            target="_blank">
                            <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24">
                                <path
                                    d="M.057,22,1.6,16.351a10.9,10.9,0,1,1,4.233,4.133L.057,22ZM6.1,18.51A9.04,9.04,0,1,0,3.59,16.066L2.674,19.41l3.43-.9ZM16.542,13.5c-.068-.114-.249-.182-.522-.318s-1.612-.8-1.862-.886-.431-.137-.613.137-.7.886-.863,1.068-.318.2-.59.068A7.435,7.435,0,0,1,9.9,12.217,8.2,8.2,0,0,1,8.386,10.33c-.159-.272-.017-.42.119-.556s.272-.318.409-.478a1.787,1.787,0,0,0,.275-.454.5.5,0,0,0-.023-.478c-.069-.136-.613-1.477-.84-2.022s-.446-.459-.613-.468l-.523-.009a1,1,0,0,0-.726.341A3.057,3.057,0,0,0,5.511,8.48,5.3,5.3,0,0,0,6.623,11.3a12.145,12.145,0,0,0,4.653,4.113,15.762,15.762,0,0,0,1.553.574,3.744,3.744,0,0,0,1.716.108,2.806,2.806,0,0,0,1.839-1.3,2.269,2.269,0,0,0,.159-1.3Z" />
                            </svg>
                            <p>
                                <strong>Demo İçin</strong>
                                <span>İletişime Geçiniz</span>
                            </p>
                        </a>
                    </div>
                    </p>

                </div>
                <div class="col-sm-8 col-md-6">
                    <div class="px-5 px-sm-0">
                        <img class="img-fluid rounded-circle" src="https://source.unsplash.com/u8Jn2rzYIps/900x900"
                            alt="..." />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-primary-to-secondary" id="download">
        <div class="container px-5">
            <h2 class="text-center text-white font-alt mb-4">Youtube Hesabımızdan Ürün Videoları Mevcut!</h2>
            <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center">
                <div class="youtube-button">
                    <span class="youtube-logo"><i style="font-size: 25px;" class="bi bi-youtube"></i> YouTube</span>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer style="background-color: #9f1ae2;" class=" text-center py-5">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div style="font-size: large;color: white;" class="mb-2">&copy; 2023. Menufoo.</div>

            </div>
        </div>
    </footer>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('cdn/js/tanitim.js') }}"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>
