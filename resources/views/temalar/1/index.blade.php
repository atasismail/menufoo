<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <title>Menufoo</title>

    <meta name="apple-mobile-web-app-status-bar-style"
        content="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->garson_buton_renk }}">
    <meta name="theme-color" content="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->garson_buton_renk }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('cdn/temalar/1/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('cdn/temalar/1/css/responsive.css') }}">

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('cdn/temalar/1/css/css.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">

    <link href="euclid-circular-a.woff2" rel="stylesheet" type="font/woff2">


    <style>
        @import url('https://menufoo.site/cdn/temalar/1/font/euclid-circular-a.css');

        .modal-backdrop {
            display: none;
        }

        .btn:focus {
            box-shadow: none;
        }

        .imgRenk {

            position: absolute;
            width: 80px;
            height: 80px;
            opacity: 0.1;
            z-index: -1;
            filter: blur(75px);
            left: 10px;
            margin-top: 10px;
            background-color: {{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }};

        }

        .swal2-title {
            font-size: 18px;
        }


        header {
            width: 100%;
            padding-top: 3rem;
            padding-bottom: 4rem;
            background: {{ count($secenek) == 0 ? '#28303f08' : $secenek[0]->ust_kutu_renk . ';' }}
        }

        header .animated-text {
            font-size: 20px;
            font-weight: 600;
            height: 80px;
            {{ count($secenek) == 0 ? '' : 'color:' . ($secenek[0]->color_text == 'Kırmızı' ? '#000' : $secenek[0]->hex_renk) . ' !important;' }}
        }

        header .btn-waiter {
            white-space: nowrap;
            {{ count($secenek) == 0 ? '' : 'background:' . $secenek[0]->garson_buton_renk . ' !important; color:' . ($secenek[0]->color_text == 'Kırmızı' ? '#000' : '#fff') . ' !important;' }} font-size: 14px;
            font-weight: 500;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        header .btn-waiter svg g rect {
            {{ count($secenek) == 0 ? '' : 'fill:' . ($secenek[0]->color_text == 'Kırmızı' ? '#000' : '#fff') . ' !important;' }}
        }

        .category-tabs button.active-category {
            font-weight: 600;
            color: {{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }};
            border-bottom: {{ count($secenek) == 0 ? '1px solid #fc4843' : '1px solid ' . $secenek[0]->hex_renk }};
        }

        .food-tabs button.active-category {
            color: #fff;
            background-color: {{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }};
            border-color: {{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }};
        }

        .menu-list .menu-item .item-action .btn-plus.active {
            border: 1px solid {{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }};
            background: {{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }};

        }

        .btn-load:active {
            outline: none !important;
            color: #fff !important;
            background: {{ count($secenek) == 0 ? '#fc4843 !important' : $secenek[0]->hex_renk . '!important' }};
        }

        .cart .items .btn-cart {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-size: 16px;
            font-weight: 500 !important;
            text-decoration: none !important;
            padding: 1rem;
            font-size: 16px;
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
            background: {{ count($secenek) == 0 ? '#fc4843 !important' : $secenek[0]->hex_renk . '!important' }};
        }

        .btn-red {
            color: #fff !important;
            border-radius: 20px !important;
            background: {{ count($secenek) == 0 ? '#fc4843 !important' : $secenek[0]->hex_renk . '!important' }};
        }

        .artiikon {
            color: {{ count($secenek) == 0 ? '#fc4843 !important' : $secenek[0]->hex_renk . '!important' }};
        }

        .btn-completeFis {
            background-color: #252525 !important;
        }

        .menu-list .menu-item .item-action .btn-plus {
            border-radius: 10px;
            margin-bottom: 0.8rem;
            padding-left: 1rem;
            padding-right: 1rem;
            padding-top: 0.3rem;
            padding-bottom: 0.3rem;
            background: {{ count($secenek) == 0 ? '#28303f08' : $secenek[0]->ust_kutu_renk . ';' }}
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center ps-2 pe-2">
                <div>
                    <span>
                        <img src="{{ asset('cdn/temalar/1/images/logo.png') }}" alt="logo" class="company-logo">
                    </span>
                    <span class="logoBaslik"></span>
                </div>


                <button id="garsonCagir" class="btn btn-sm btn-rounded btn-waiter p-2 ps-3 pe-3" data-bs-toggle="modal"
                    data-bs-target="#waiterModal">
                    <svg width="20" height="20" viewBox="0 0 41 41" fill="none"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <mask id="mask0_36_42" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                            width="41" height="41">
                            <rect x="0.0239258" y="0.823242" width="40" height="40" fill="url(#pattern0)" />
                        </mask>
                        <g mask="url(#mask0_36_42)">
                            <rect x="0.0239258" y="0.823242" width="40" height="40" fill="#28303F" />
                        </g>
                        <defs>
                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                height="1">
                                <use xlink:href="#image0_36_42" transform="scale(0.00195312)" />
                            </pattern>
                            <image id="image0_36_42" width="512" height="512"
                                xlink:href="data:image/png;base64,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" />
                        </defs>
                    </svg>
                    <span style="margin-left: 5px; font-weight: 600;"> Garson Çağır</span></button>
            </div>

            <div class="animated-text mt-5 ps-2 pe-2">
            </div>
        </div>
    </header>

    <div class="container-fluid ps-4 pe-4">

        <div class="search-form">
            <svg width="15" height="15" viewBox="0 0 42 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20 39.6619C30.4934 39.6619 39 31.1553 39 20.6619C39 10.1684 30.4934 1.66187 20 1.66187C9.50658 1.66187 1 10.1684 1 20.6619C1 31.1553 9.50658 39.6619 20 39.6619Z"
                    stroke="#28303F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M41 41.6619L37 37.6619" stroke="#28303F" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>

            <input type="text" name="search" id="search" placeholder="Menüde Ara..." autocomplete="off">
        </div>
    </div>

    <div style="padding: 0;" class="container-fluid">
        <div class="category-tabs mt-4 mb-3">
        </div>
        <div class="food-tabs"></div>

    </div>
    <div class="container-fluid ps-4 pe-4">

        <div class="categories"></div>

        <div class="filtered"></div>
    </div>

    <!-- Yeni -->



    <div style="display: none;" class="cart cart-gizle">

        <div class="items">
            <div class="product-count d-flex">
                <span class="toplam-urun">0</span>
                Ürün
            </div>
            <div class="total d-flex toplam-fiyat">
                <span>0</span>,00 Tl
            </div>
            <div class="btn-cart sepete_git">
                <div>Sepete Git</div>
            </div>
        </div>

    </div>


    <div class="popup-container closePopup" id="garsonDetay">
        <div class="popup garson-modal waiter-modal" id="popup">
            <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-scrollable">
                <div class="modal-content" style="max-height: 85vh;">
                    <div class="modal-header border-0 d-flex justify-content-center align-items-center">
                        <div class="bell-icon">
                            <img src="{{ asset('cdn/temalar/1/images/zil.png') }}" alt="bell">
                        </div>
                    </div>
                    <div class="modal-body">

                        <div class="h4 text-center fw-bold">Bi’ Garson</div>

                        <p class="mt-3 mb-3 text-center fs-6">Garson çağırmak için lütfen garson çağır butonuna
                            tıklayınız; değerli garson arkadaşlarımız anında hizmetinizde olacaklardır.</p>


                        <div class="table-info">
                            <div class="left">Masa Numaranız</div>
                            <div class="right">No: {{ $masa_adi }} </div>
                        </div>

                        <button id="garsonBildir" class="btn w-100 btn-waiter-call p-3 btn-red">Garson Çağır</button>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="all-modals"></div>

    <div class="modal sepet_detay" style=" display: none;">
        <div class="modal-dialog modal-fullscreen">
            <div style="padding: 0;" class="modal-content">
                <div style="border: none; flex-direction: row-reverse; " class="modal-header">
                    <h5 style="margin: 0px auto;font-size: 18px;font-weight: 600;" class="modal-title h4"
                        id="exampleModalFullscreenLabel"> Sepetim</h5>
                    <div style="margin: 0;" type="button" id="sepeti_kapat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                            </path>
                        </svg>
                    </div>

                </div>
                <div class="modal-body">
                    <div class="cart-items mb-5" id="sepet-listesi">


                    </div>

                    <div class="h4 mt-3 mb-3">Diğer Detaylar</div>


                    <div class="table-info">
                        <div class="left">Masa Numaranız</div>
                        <div class="right">No: {{ $masa_adi }} </div>
                    </div>

                    <div class="order-notes">
                        <div class="h6 mt-3 mb-3">Sipariş Notlarınız</div>
                        <textarea name="note" id="note" cols="30" rows="5"
                            placeholder="Sipariş Notunuzu Girebilirsiniz.."></textarea>
                    </div>

                    <div class="order-summary mb-5">
                        <div class="h6  mt-3 mb-3">Son Olarak</div>
                        <div class="description">Ödeme kasaya yapılacaktır. Siparişi verdikten sonraki ekrandan “Hesap
                            İste”
                            butonunu kullanarak da ödeme yapabilirsiniz.</div>
                        <div class="summary">
                            <div class="product-count">
                                <span class="toplam-urun">0</span>
                                Ürün
                            </div>
                            <div class="total toplam-fiyat">
                                <span>0</span>,0 Tl
                            </div>
                        </div>
                    </div>
                </div>
                <div style="justify-content: space-between;" class="modal-footer">
                    <div style="font-size: 20px;font-weight: 800;" class="tutar">

                    </div>
                    <button class="btn btn-red btn-complete siparis_uyari">Siparişi
                        Tamamla</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fish_detay" style=" display: none;">
        <div class="modal-dialog modal-fullscreen">
            <div style="padding: 0;" class="modal-content">
                <div style="border: none; flex-direction: row-reverse; " class="modal-header">
                    <h5 style="margin: 0px auto;font-size: 18px;font-weight: 600;" class="modal-title h4"
                        id="exampleModalFullscreenLabel"> Sipariş Tamamlandı</h5>
                    <div style="margin: 0;" type="button" id="fisi_kapat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z">
                            </path>
                        </svg>
                    </div>

                </div>
                <div class="modal-body">

                    <div class="container">

                        <div class="receipt" id="pdf-content">
                            <div class="title">SİPARİŞ FİŞİ</div>

                            <div class="list" id="fis-listesi">

                            </div>

                            <div class="left-notch"></div>
                            <div class="right-notch"></div>

                            <div class="summary">
                                <div class="product-count"><span class="toplam-urun">0</span> Ürün</div>
                                <div class="total toplam-fiyat"></div>
                            </div>

                        </div>

                        <div class="order-processing mt-4">
                            <div class="h6 mb-3">Siparişiniz Hazırlanıyor</div>
                            <div class="description">Siparişinizin ödemesini kasada ödeyebilirsiniz. Herhangi bir sorun
                                yaşamamak için
                                lütfen fişi telefonunuza kaydediniz. </div>
                        </div>


                    </div>


                </div>
                <div style="justify-content: space-between;" class="modal-footer">

                    <button id="generate-pdf" class="btn btn-red btn-completeFis">Fişi Kaydet</button>
                    <button id="anasayfaya_git" class="btn btn-red btn-complete">Anasayfaya Dönün</button>
                </div>
            </div>
        </div>
    </div>





    <footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
        {{-- <img src="{{ asset('cdn/temalar/1/images/footer-logo.png') }}" alt="footer-logo"> --}}
        <svg width="120" height="40" viewBox="0 0 190 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="Group 84">
                <path id="m"
                    d="M0 38.6746H6.26641V27.3231C6.26641 26.1417 6.31777 24.344 7.1396 23.0085C7.80733 21.8272 8.88597 21.0567 10.581 21.0567C11.1974 21.0567 12.3274 21.1594 13.1492 22.1867C13.6115 22.7517 14.1765 23.9331 14.1765 26.5527V38.6746H20.4429V27.3231C20.4429 26.1417 20.4942 24.344 21.3161 23.0085C21.9838 21.8272 23.0624 21.0567 24.7575 21.0567C25.3738 21.0567 26.5038 21.1594 27.3257 22.1867C27.7879 22.7517 28.3529 23.9331 28.3529 26.5527V38.6746H34.6193V24.7035C34.6193 22.2381 34.5166 20.3376 33.0784 18.4371C32.2052 17.3071 30.5102 15.7148 27.0688 15.7148C23.2165 15.7148 21.0079 18.0262 19.9292 19.7726C19.3642 18.6426 17.5665 15.7148 12.8924 15.7148C11.5569 15.7148 8.62915 15.9717 6.26641 18.9508V16.4339H0V38.6746Z"
                    fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                <path id="e"
                    d="M55.8573 31.535C54.8301 33.3327 53.0323 34.4627 50.6696 34.4627C48.2555 34.4627 46.8686 33.2813 46.2009 32.3568C45.4818 31.3809 45.1223 29.9427 45.1223 28.6072H61.7642V28.0936C61.7642 25.6795 61.456 22.1867 59.0933 19.3617C57.5524 17.5126 54.9328 15.7148 50.4128 15.7148C47.7418 15.7148 44.66 16.2798 42.0404 18.848C40.4481 20.4403 38.6504 23.1626 38.6504 27.5799C38.6504 31.0727 39.6777 33.9491 42.1431 36.2605C44.3518 38.3664 47.0741 39.3937 50.6696 39.3937C58.4255 39.3937 60.9424 34.1032 61.6101 32.4595L55.8573 31.535ZM45.3277 24.6008C45.8414 21.6217 48.2555 20.1321 50.5668 20.1321C52.8782 20.1321 55.3437 21.5703 55.8573 24.6008H45.3277Z"
                    fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                <path id="n"
                    d="M65.7954 38.6746H72.0618V27.3231C72.0618 26.039 72.1132 24.4467 73.0377 23.0085C73.9623 21.6217 75.2464 21.0567 76.89 21.0567C77.5064 21.0567 78.8419 21.1594 79.8178 22.1867C80.9478 23.3681 80.9992 25.3199 80.9992 26.5527V38.6746H87.2656V24.7035C87.2656 22.5463 87.0601 20.3376 85.5192 18.4371C83.7728 16.2798 80.8964 15.7148 78.9446 15.7148C75.3491 15.7148 73.2432 17.6667 72.0618 19.3103V16.4339H65.7954V38.6746Z"
                    fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                <path id="f"
                    d="M131.283 21.7655V16.4236H125.53V11.1331C125.53 9.28404 125.684 8.10266 126.198 7.28084C126.814 6.35629 127.636 6.15083 128.458 6.15083C129.536 6.15083 130.41 6.40765 131.283 7.07538V1.37398C130.204 0.860335 129.074 0.603516 127.687 0.603516C125.376 0.603516 123.527 1.32261 122.191 2.45262C119.418 4.764 119.264 8.25676 119.264 10.3113V16.4236H116.901V21.7655H119.264V38.6643H125.53V21.7655H131.283Z"
                    fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                <g id="Group 82">
                    <g id="Group 77">
                        <path id="oo"
                            d="M177.262 4.63477C173.05 4.63477 170.174 6.02159 168.273 7.76797C166.065 9.77117 164.524 12.853 164.524 16.4999C164.524 20.0953 166.065 23.1772 168.273 25.1804C170.174 26.9268 173.05 28.3136 177.262 28.3136C181.474 28.3136 184.35 26.9268 186.251 25.1804C188.46 23.1772 190 20.0953 190 16.4999C190 12.853 188.46 9.77117 186.251 7.76797C184.35 6.02159 181.474 4.63477 177.262 4.63477ZM177.262 22.7663C173.615 22.7663 170.996 19.8899 170.996 16.4999C170.996 13.0071 173.667 10.1821 177.262 10.1821C180.858 10.1821 183.529 13.0071 183.529 16.4999C183.529 19.8899 180.909 22.7663 177.262 22.7663Z"
                            fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                        <path id="oo_2"
                            d="M148.069 4.63477C143.857 4.63477 140.981 6.02159 139.08 7.76797C136.871 9.77117 135.331 12.853 135.331 16.4999C135.331 20.0953 136.871 23.1772 139.08 25.1804C140.981 26.9268 143.857 28.3136 148.069 28.3136C152.281 28.3136 155.157 26.9268 157.058 25.1804C159.266 23.1772 160.807 20.0953 160.807 16.4999C160.807 12.853 159.266 9.77117 157.058 7.76797C155.157 6.02159 152.281 4.63477 148.069 4.63477ZM148.069 22.7663C144.422 22.7663 141.802 19.8899 141.802 16.4999C141.802 13.0071 144.473 10.1821 148.069 10.1821C151.664 10.1821 154.335 13.0071 154.335 16.4999C154.335 19.8899 151.716 22.7663 148.069 22.7663Z"
                            fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                    </g>
                    <rect id="Rectangle 17" x="135.314" y="32.3352" width="54.6736" height="6.2988"
                        fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                </g>
                <g id="Group 78">
                    <path id="u"
                        d="M91.2969 16.4346V30.046C91.2969 32.0492 91.5537 34.7202 94.0192 36.8774C96.0737 38.6752 99.361 39.3943 102.083 39.3943C104.806 39.3943 108.093 38.6752 110.147 36.8774C112.613 34.7202 112.87 32.0492 112.87 30.046V16.4346H106.603V29.0188C106.603 30.2001 106.501 31.7924 105.268 32.9224C104.497 33.5902 103.265 34.0524 102.083 34.0524C100.902 34.0524 99.6692 33.5902 98.8988 32.9224C97.666 31.7924 97.5633 30.2001 97.5633 29.0188V16.4346H91.2969Z"
                        fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                    <rect id="Rectangle 18" x="98.5903" y="9.11768" width="6.90947" height="5.75789"
                        fill="{{ count($secenek) == 0 ? '#fc4843' : $secenek[0]->hex_renk }}" />
                </g>
            </g>
        </svg>



        <script>
            function updateZoom() {
                if ($(window).width() < 300) {
                    $('body').css('zoom', '0.8');
                } else {
                    $('body').css('zoom', '1');
                }
            }

            // Sayfa yüklendiğinde ve pencere boyutu değiştiğinde kontrolü yap
            updateZoom();








            let secimSayi = 0;
            let fiyat = 0;
            var nf = new Intl.NumberFormat();
            let sepet = [];
            let fishBilgi = [];
            let firstCategory = 0;
            let firmaImages = "/cdn/firma/";
            let images = "/cdn/images/urunler/";

            $(window).on("popstate", function() {
                if (window.location.hash != "#urunDetay" && window.location.hash != "#garson") {
                    $("body").css("overflow-y", "scroll");
                    $(".popup").css("transform", "translateY(100%)");
                    setTimeout(function() {
                        $(".popup-container").hide();
                    }, 300);
                }
                $("body").css("overflow-y", "scroll");
                $(".sepet_detay").hide();
                $(".fish_detay").hide();
            });


            $(document).ready(function() {


                $(document).on('click', '#generate-pdf', function() {
                    const pdfContent = $('#pdf-content');

                    // Tıklanan elementi seç
                    const clickedElement = $(this);


                    // HTML içeriğini PDF'e dönüştürme işlemi
                    html2pdf()
                        .set({
                            margin: 10, // Kenar boşluğu ayarı (isteğe bağlı)
                            filename: 'fis.pdf', // PDF dosya adı
                            pagebreak: {
                                mode: 'avoid-all',
                                before: '.page-break'
                            }, // Sayfa kesme ayarı
                            jsPDF: {
                                unit: 'mm',
                                format: 'a4',
                                orientation: 'portrait'
                            } // PDF formatı ve oryantasyonu
                        })
                        .from(pdfContent.get(0)) // jQuery nesnesini DOM elemanına çevirme
                        .save('fis.pdf');
                });

                $(document).on("click", "#garsonCagir", function() {
                    location.hash = "garson";
                    $("body").css("overflow-y", "hidden");
                    $("#garsonDetay").show();
                    setTimeout(function() {
                        $(".popup.garson-modal#popup").css("transform", "translateY(0)");
                    }, 0);
                });



                $('.siparis_uyari').click(function(e) {
                    Swal.fire({
                        title: 'Siparis Edilsinmi?',
                        text: "Siparis Bildirimi Gönderilecek",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "İptal",
                        confirmButtonText: 'Sipariş Et!',
                        reverseButtons: true
                    }).then((result) => {
                        var noteContent = $("#note").val();

                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "",
                                html: ``,
                                showCancelButton: false,
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                willOpen: () => {
                                    // Sipariş işleme animasyonu başlat
                                    $(".siparis_islemi_animasyon").show();
                                },
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                willClose: () => {
                                    // Sipariş işleme animasyonunu durdur
                                    $(".siparis_islemi_animasyon").hide();
                                }
                            }).then((result) => {
                                // Siparişin işlenmesi tamamlanınca...
                                // ...
                            });

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "Post",
                                url: "/bildirim",
                                data: JSON.stringify({
                                    "not": noteContent,
                                    "masa_adi": "{{ $masa_adi }}",
                                    'tema_id': {{ $tema_id }},
                                    'user_id': {{ $user_id }},
                                    fishBilgi
                                }),
                                contentType: "application/json; charset=utf-8",

                                success: function(response) {
                                    Swal.close();
                                    console.log(response);
                                    if (response == "ok") {
                                        // console.log(fishBilgi);
                                        Swal.fire({
                                                icon: 'success',
                                                title: 'Sipariş Başarıyla Gerçekleşti Fişinizi Kaydetmeyi Unutmayınız',
                                                allowOutsideClick: false,
                                            })
                                            .then(() => {
                                                $("body").css("overflow-y", "hidden");
                                                $(".fish_detay").show();

                                            });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Siparişiniz Başarısız oldu Lütfen Garson Arkadaşla Etkileşime Geçiniz',
                                            allowOutsideClick: false,
                                        })
                                    }

                                }
                            });


                        }
                    })

                });


                $(document).on("click", "#garsonBildir", function() {
                    Swal.fire({
                        title: 'Garson Çağırılsımı ?',
                        // text: "Siparis Bildirimi Gönderilecek",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: "Hayır",
                        confirmButtonText: 'Evet!',
                        reverseButtons: true,
                        allowOutsideClick: false,
                    }).then((result) => {
                        var noteContent = $("#note").val();

                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "",
                                // html: ``,
                                showCancelButton: false,
                                showConfirmButton: false,
                                allowOutsideClick: false,
                                willOpen: () => {
                                    // Sipariş işleme animasyonu başlat
                                    $(".siparis_islemi_animasyon").show();
                                },
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                willClose: () => {
                                    // Sipariş işleme animasyonunu durdur
                                    $(".siparis_islemi_animasyon").hide();
                                }
                            }).then((result) => {
                                // Siparişin işlenmesi tamamlanınca...
                                // ...
                            });

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            $.ajax({
                                type: "Post",
                                url: "/garson/bildirim",
                                data: JSON.stringify({
                                    "masa_adi": "{{ $masa_adi }}",
                                    'tema_id': {{ $tema_id }},
                                    'user_id': {{ $user_id }},
                                }),
                                contentType: "application/json; charset=utf-8",


                                success: function(response) {
                                    console.log(response);

                                    if (response == "ok") {
                                        // console.log(fishBilgi);
                                        Swal.fire({
                                                icon: 'success',
                                                title: 'Çeğrı İşlemi Başarılı',
                                                allowOutsideClick: false,
                                            })
                                            .then(() => {
                                                $("body").css("overflow-y", "scroll");
                                                $(".popup").css("transform",
                                                    "translateY(100%)");
                                                setTimeout(function() {
                                                    $(".popup-container")
                                                        .hide();
                                                }, 300);

                                            });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Siparişiniz Başarısız oldu Lütfen Garson Arkadaşla Etkileşime Geçiniz',
                                            allowOutsideClick: false,
                                        })
                                    }

                                }
                            });


                        }
                    })

                });


                $.get("{{ $_SERVER['REQUEST_URI'] }}/json", function(response) {
                    let data = response.data.firma;

                    // LOGO EKLEMEK
                    $(".company-logo").attr("src", firmaImages + data.firmaLogo);
                    // FİRMA ADINI EKLEMEK
                    $(".logoBaslik").text(data.firmaAdi);
                    // ANİMASYONLU YAZI
                    $(".animated-text").typed({
                        strings: data.animasyonluYazilar,
                        startDelay: 0, // Yazmaya başlama gecikmesi (isteğe bağlı)
                        backSpeed: {{ count($secenek) == 0 ? 20 : intval($secenek[0]->yazi_silme_hizi) }}, // Silme hızı (isteğe bağlı)
                        typeSpeed: {{ count($secenek) == 0 ? 20 : intval($secenek[0]->yazi_hizi) }}, // Yazma hızını burada ayarlayabilirsiniz (milisaniye cinsinden)
                        backDelay: {{ count($secenek) == 0 ? 100 : intval($secenek[0]->yazi_silme_bekleme) }}, // Silme sonrası bekleme süresi (isteğe bağlı)
                        showCursor: false, // İmleci gizlemek istiyorsanız
                        contentType: "html", // Metni düz bir şekilde işaretleme
                        loop: true, // Döngüyü aç veya kapat (isteğe bağlı)
                    });
                    // Üst Kategorileri Yükle ve Alt Kategorileri Göster
                    data.ustKategoriler.forEach((category, key) => {
                        if (key == 0) {
                            $(".category-tabs").append(
                                "<button  class='item active-category' data-category='" +
                                key +
                                "'>" +
                                category.name +
                                "</button>"
                            );
                        } else {
                            $(".category-tabs").append(
                                "<button class='item' data-category='" +
                                key +
                                "'>" +
                                category.name +
                                "</button>"
                            );
                        }
                    });
                    // ÜST KATEGORİ TIKLAMA OLAYI ve ALT KATEGORİLERİ LİSTELEME
                    $(document).on("click", ".category-tabs button", function() {
                        let el = $(this);
                        $("#search").val("");
                        $(".category-tabs .active-category").removeClass("active-category");
                        el.addClass("active-category");
                        if (el.data("category") === 0) {
                            $(".food-tabs").empty();
                            $(".all-modals").empty();
                            $(".categories").empty();
                            $(".filtered").empty();
                            $(".categories").removeClass("d-none");
                            tumUrunler(data, images);
                            updateSepetButonlari();
                        } else {
                            let products;
                            let urunHTML;
                            let menuHTML;
                            let parsePrice;
                            let urunLimit = 0;
                            let ustKategoriKey = el.data("category");
                            $(".food-tabs").empty();
                            $(".all-modals").empty();
                            data.altKategoriler[el.data("category")].forEach((category, key) => {
                                $(".food-tabs").append(
                                    "<button class='item' data-parent='" +
                                    el.data("category") +
                                    "' data-category='" +
                                    key +
                                    "'>" +
                                    category.name +
                                    "</button>"
                                );
                            });
                            products = [];
                            $(".categories").addClass("d-none");
                            $(".filtered").empty();
                            Object.values(data.urunler[ustKategoriKey]).forEach(
                                (altKategoriDetay, altKategoriKey) => {
                                    urunLimit = 0;
                                    products = [];
                                    let modals = [];
                                    let categoryName =
                                        data.altKategoriler[ustKategoriKey][altKategoriKey]
                                        .name;
                                    Object.values(altKategoriDetay).forEach((urunDetay,
                                        urunKey) => {
                                        parsePrice = nf.format(urunDetay.fiyat).split(
                                            ",");
                                        urunHTML = urunTasarim(
                                            (id = urunDetay.id),
                                            (key = urunKey),
                                            (dosyaYolu = images),
                                            (resim = urunDetay.urun_resmi),
                                            (isim = urunDetay.urun_adi),
                                            (icindekiler = urunDetay.urun_icerik),
                                            (parsePrice0 = parsePrice[0]),
                                            (parsePrice1 = parsePrice[1]),
                                            (ustKategoriKey = ustKategoriKey),
                                            (altKategoriKey = altKategoriKey)
                                        );
                                        modalHTML = popupTasarim(
                                            (id = urunDetay.id),
                                            (key = urunKey),
                                            (dosyaYolu = images),
                                            (resim = urunDetay.urun_resmi),
                                            (isim = urunDetay.urun_adi),
                                            (icindekiler = urunDetay.urun_icerik),
                                            (parsePrice0 = parsePrice[0]),
                                            (parsePrice1 = parsePrice[1]),
                                            (ekAd = urunDetay.ek_ad),
                                            (ekIcerik = urunDetay.ek_icerik),
                                            (ustKategoriKey = ustKategoriKey),
                                            (altKategoriKey = altKategoriKey)
                                        );
                                        if (urunLimit != 3) {
                                            urunLimit++;
                                            products.push(urunHTML);
                                            modals.push(modalHTML);
                                        }
                                    });
                                    menuHTML = urunDivTasarim(
                                        (kategoriAdi = categoryName),
                                        (urunler = products),
                                        (ustKategoriKey = ustKategoriKey),
                                        (altKategoriKey = altKategoriKey)
                                    );
                                    $(".filtered").append(menuHTML);
                                    $(".all-modals").append(modals.join("\n"));
                                }
                            );
                            updateSepetButonlari();
                            $(".filtered").hide().show();
                        }
                    });
                    // TÜM ÜRÜNLERİ GÖSTERME
                    tumUrunler(data, images);
                    // MODAL KAPATMA OLAYI
                    $(document).on("click", ".closePopup", function() {
                        window.history.back(1);
                        $("body").css("overflow-y", "scroll");
                        $(".popup").css("transform", "translateY(100%)");



                        setTimeout(function() {
                            $(".popup-container").hide();
                        }, 300);
                    });
                    $(document).on("click", ".popup", function(e) {
                        e.stopPropagation();
                    });
                    // ALT KATEGIRİ TIKLAMA OLAYI
                    $(document).on("click", ".food-tabs button", function() {
                        let el = $(this);
                        $("#search").val("");
                        $(".food-tabs .active-category").removeClass("active-category");
                        el.addClass("active-category");
                        $(".categories").addClass("d-none");
                        let ustKategoriKey = el.data("parent");
                        let altKategoriKey = el.data("category");
                        let products = Object.values(
                            data.urunler[ustKategoriKey][altKategoriKey]
                        );
                        $(".filtered").empty();
                        urunLimit = 0;
                        products = [];
                        modals = [];
                        Object.values(data.urunler[ustKategoriKey][altKategoriKey]).forEach(
                            (urunDetay, urunKey) => {
                                categoryName =
                                    data.altKategoriler[ustKategoriKey][altKategoriKey].name;
                                parsePrice = nf.format(urunDetay.fiyat).split(",");
                                urunHTML = urunTasarim(
                                    (id = urunDetay.id),
                                    (key = urunKey),
                                    (dosyaYolu = images),
                                    (resim = urunDetay.urun_resmi),
                                    (isim = urunDetay.urun_adi),
                                    (icindekiler = urunDetay.urun_icerik),
                                    (parsePrice0 = parsePrice[0]),
                                    (parsePrice1 = parsePrice[1]),
                                    (ustKategoriKey = ustKategoriKey),
                                    (altKategoriKey = altKategoriKey)
                                );
                                modalHTML = popupTasarim(
                                    (id = urunDetay.id),
                                    (key = urunKey),
                                    (dosyaYolu = images),
                                    (resim = urunDetay.urun_resmi),
                                    (isim = urunDetay.urun_adi),
                                    (icindekiler = urunDetay.urun_icerik),
                                    (parsePrice0 = parsePrice[0]),
                                    (parsePrice1 = parsePrice[1]),
                                    (ekAd = urunDetay.ek_ad),
                                    (ekIcerik = urunDetay.ek_icerik),
                                    (ustKategoriKey = ustKategoriKey),
                                    (altKategoriKey = altKategoriKey)
                                );

                                if (urunLimit != 3) {
                                    urunLimit++;
                                    products.push(urunHTML);
                                    modals.push(modalHTML);
                                }
                            }
                        );
                        if (products.length != 0) {
                            menuHTML = urunDivTasarim(
                                (kategoriAdi = categoryName),
                                (urunler = products),
                                (ustKategoriKey = ustKategoriKey),
                                (altKategoriKey = altKategoriKey)
                            );

                            $(".filtered").append(menuHTML).hide().show();
                            updateSepetButonlari();
                        }

                    });
                    // DAHA FAZLA BUTONU
                    $(document).on("click", ".btn-load", function() {
                        let el = $(this);
                        let ustKategoriKey = el.data("parent");
                        let altKategoriKey = el.data("category");
                        let products = [];
                        let urunHTML;
                        let modals = [];
                        let parsePrice;
                        let urunLimit = 0;
                        $("#search").val("");
                        urunLimit = 0;
                        if (el.data("index") != 0) {
                            for (
                                let i = el.data("index"); i <
                                Object.values(data.urunler[ustKategoriKey][altKategoriKey])
                                .length; i++
                            ) {
                                const urunDetay = Object.values(
                                    data.urunler[ustKategoriKey][altKategoriKey]
                                )[i];
                                CategoryName =
                                    data.altKategoriler[ustKategoriKey][altKategoriKey].name;
                                parsePrice = nf.format(urunDetay.fiyat).split(",");
                                urunHTML = urunTasarim(
                                    (id = urunDetay.id),
                                    (key = i),
                                    (dosyaYolu = images),
                                    (resim = urunDetay.urun_resmi),
                                    (isim = urunDetay.urun_adi),
                                    (icindekiler = urunDetay.urun_icerik),
                                    (parsePrice0 = parsePrice[0]),
                                    (parsePrice1 = parsePrice[1]),
                                    (ustKategoriKey = ustKategoriKey),
                                    (altKategoriKey = altKategoriKey)
                                );
                                modalHTML = popupTasarim(
                                    (id = urunDetay.id),
                                    (key = i),
                                    (dosyaYolu = images),
                                    (resim = urunDetay.urun_resmi),
                                    (isim = urunDetay.urun_adi),
                                    (icindekiler = urunDetay.urun_icerik),
                                    (parsePrice0 = parsePrice[0]),
                                    (parsePrice1 = parsePrice[1]),
                                    (ekAd = urunDetay.ek_ad),
                                    (ekIcerik = urunDetay.ek_icerik),
                                    (ustKategoriKey = ustKategoriKey),
                                    (altKategoriKey = altKategoriKey)
                                );
                                if (urunLimit != 3) {
                                    urunLimit++;
                                    products.push(urunHTML);
                                    modals.push(modalHTML);
                                }
                            }

                            const newProducts = $(products.join("\n")).appendTo(
                                el.parent().children(".menu-list")
                            );
                            newProducts.css("opacity", 0);
                            newProducts.animate({
                                opacity: 1
                            }, 500);
                            $(".all-modals").append(modals.join("\n"));
                            let limit =
                                el.data("index") + 3 <
                                Object.values(data.urunler[ustKategoriKey][altKategoriKey]).length ?
                                el.data("index") + 3 :
                                0;
                            el.data("index", limit);
                            if (limit === 0) {
                                el.remove();
                            }
                            updateSepetButonlari();
                        } else {
                            el.remove();
                        }
                    });

                    // SEPETE EKLE
                    $(document).on("click", ".sepete-ekle", function() {
                        let el = $(this);
                        let kategoriKey = el.data("kategori");
                        let altKey = el.data("alt");
                        let urunKey = el.data("id");

                        let urun_data_id = el.data("urun_id");

                        if (urun_data_id == null) {
                            urun_data_id = el.data("urun_detay_id");
                        } else {
                            urun_data_id = el.data("urun_id");
                        }

                        // Sepetteki ürünü kontrol et
                        let urun = {
                            kategoriKey: kategoriKey,
                            altKey: altKey,
                            urunKey: urunKey,
                            adet: 1,
                        };

                        let sepetteVarMi = false;
                        for (let i = 0; i < sepet.length; i++) {
                            if (
                                sepet[i].kategoriKey === kategoriKey &&
                                sepet[i].altKey === altKey &&
                                sepet[i].urunKey === urunKey
                            ) {
                                sepetteVarMi = true;
                                sepet.splice(i, 1);
                                break;
                            }
                        }

                        if (!sepetteVarMi) {
                            sepet.push(urun);
                        }

                        // Sepet dizisine göre buton rengini ve ikonu güncelle
                        if (sepetteVarMi) {
                            $("[data-urun_id='" + urun_data_id + "']").removeClass("active");
                            $("[data-urun_detay_id='" + urun_data_id + "']").text("Sepete Ekle");
                        } else {
                            $("[data-urun_id='" + urun_data_id + "']").addClass("active");
                            $("[data-urun_detay_id='" + urun_data_id + "']").text(
                                "Sepetten Çıkart"
                            );
                        }

                        // Sepet işlemlerini burada yapabilirsiniz
                        sepetiGuncelle(data, sepet);
                    });

                    // SEPETE GİT
                    $(".sepete_git").click(function(e) {
                        location.hash = "sepetDetay";
                        $("body").css("overflow-y", "hidden");
                        $(".sepet_detay").show();
                    });

                    // SEPETİ KAPAT
                    $("#sepeti_kapat").click(function(e) {
                        window.history.back(1);
                        $("body").css("overflow-y", "scroll");
                        $(".sepet_detay").hide();

                    });

                    $("#fisi_kapat").click(function(e) {
                        window.history.back(1);
                        $("body").css("overflow-y", "scroll");
                        $(".modal fish_detay").hide();
                        sepet = [];
                        fishBilgi = [];
                        updateSepetButonlari();
                        $(".cart-gizle").css("display", "none");

                    });

                    $("#anasayfaya_git").click(function(e) {
                        window.history.back(1);
                        $("body").css("overflow-y", "scroll");
                        $(".modal fish_detay").hide();
                        sepet = [];
                        fishBilgi = [];
                        updateSepetButonlari();
                        $(".cart-gizle").css("display", "none");

                    });



                    // Artırma düğmesine tıklanınca
                    $(document).on("click", ".btn-increment", function() {
                        const parent = $(this).closest(".cart-item");
                        const input = parent.find("#urun_adeti");

                        let quantity = parseInt(input.text());
                        quantity++;
                        input.text(quantity);
                        const index = parent.index();
                        sepet[index].adet = quantity;

                        sepetiGuncelle(data, sepet);
                    });

                    // Azaltma düğmesine tıklanınca
                    $(document).on("click", ".btn-decrement", function() {
                        const parent = $(this).closest(".cart-item");

                        const input = parent.find("#urun_adeti");

                        let quantity = parseInt(input.text());

                        if (quantity == 1) {
                            input.text(1);
                            const index = parent.index();
                            sepet[index].adet = quantity;
                            quantity = 1;
                        } else {
                            quantity--;
                            input.text(quantity);
                            const index = parent.index();
                            sepet[index].adet = quantity;
                        }

                        sepetiGuncelle(data, sepet);
                    });

                    // Sepetten çıkar butonlarına tıklamayı dinle
                    $(document).on("click", ".sepetten-cikar", function() {
                        let urun_id = $(this).data("urun_id");
                        let index = $(this).data("index");

                        // Ürünü sepette bul ve çıkar
                        sepet.splice(index, 1);

                        $("[data-urun_id='" + urun_id + "']").removeClass("active");
                        $("[data-urun_detay_id='" + urun_id + "']").text("Sepete Ekle");

                        // Sepet öğelerini güncelle
                        sepetiGuncelle(data, sepet);
                    });


                    // Arama Kutusu

                    $(document).on('click', '.search-form', function() {

                        $("html, body").animate({
                            scrollTop: 240
                        }, {
                            duration: "fast"
                        });
                    });

                    $(document).on("keyup", "#search", function() {

                        let el = $(this);
                        let aramaKelimesi = el.val().toLowerCase();
                        let aramaSonuclari = $(".filtered");

                        aramaSonuclari.addClass("pt-3");

                        if (aramaKelimesi.length > 0) {
                            $(".categories").addClass("d-none");

                            $(".filtered").empty();

                            $.each(data.urunler, function(kategoriIndex, kategoriler) {
                                $.each(kategoriler, function(altKategoriIndex,
                                    altKategoriler) {
                                    $.each(altKategoriler, function(index,
                                        urunDetay) {
                                        if (urunDetay.urun_adi.toLowerCase()
                                            .includes(aramaKelimesi) ||
                                            urunDetay.urun_icerik
                                            .toLowerCase()
                                            .includes(aramaKelimesi)) {

                                            parsePrice = nf.format(urunDetay
                                                .fiyat).split(",");

                                            urunHTML = urunTasarim(
                                                (id = urunDetay.id),
                                                (key = index),
                                                (dosyaYolu = images),
                                                (resim = urunDetay
                                                    .urun_resmi),
                                                (isim = urunDetay
                                                    .urun_adi),
                                                (icindekiler = urunDetay
                                                    .urun_icerik),
                                                (parsePrice0 =
                                                    parsePrice[
                                                        0]),
                                                (parsePrice1 =
                                                    parsePrice[
                                                        1]),
                                                (ustKategoriKey =
                                                    kategoriIndex),
                                                (altKategoriKey =
                                                    altKategoriIndex)
                                            );

                                            modalHTML = popupTasarim(
                                                (id = urunDetay.id),
                                                (key = index),
                                                (dosyaYolu = images),
                                                (resim = urunDetay
                                                    .urun_resmi),
                                                (isim = urunDetay
                                                    .urun_adi),
                                                (icindekiler = urunDetay
                                                    .urun_icerik),
                                                (parsePrice0 =
                                                    parsePrice[
                                                        0]),
                                                (parsePrice1 =
                                                    parsePrice[
                                                        1]),
                                                (ekAd = urunDetay
                                                    .ek_ad),
                                                (ekIcerik = urunDetay
                                                    .ek_icerik),
                                                (ustKategoriKey =
                                                    kategoriIndex),
                                                (altKategoriKey =
                                                    altKategoriIndex)
                                            );
                                            menuHTML = `
                                    <div class="category my-2">
                                        <div class="menu-list">
                                            ` + urunHTML + `
                                        </div>
                                        ` + modalHTML + `
                                    </div>
                                    `;


                                            aramaSonuclari.append(menuHTML);
                                        }
                                    });
                                });
                            });
                        } else {
                            $(".categories").removeClass("d-none");
                        }


                    });



                });
            });
            // FONKSİYONLAR
            function sepetiGuncelle(data, sepet) {
                if (sepet.length <= 0) {
                    $(".cart-gizle").css("display", "none");
                } else {
                    $(".cart-gizle").css("display", "flex");
                }
                let sepetListesi = $("#sepet-listesi");
                let fisListesi = $("#fis-listesi");
                let toplamFiyat = 0;
                let toplamUrun = 0;

                // Sepet öğelerini listele
                sepetListesi.empty();
                fisListesi.empty();
                fishBilgi = [];

                for (let i = 0; i < sepet.length; i++) {
                    let urun = sepet[i];

                    let urunBilgisi = data.urunler[urun.kategoriKey][urun.altKey][urun.urunKey];

                    toplamFiyat += urunBilgisi.fiyat.replace(",", ".") * urun.adet;
                    toplamUrun += urun.adet;

                    let parsedPrice = (urunBilgisi.fiyat.replace(",", ".") * urun.adet).toFixed(
                        2
                    );

                    let sepetOgeHTML = `<div class="cart-item">
                <div class="left">
                    <img style="width: 80px; height: 80px;object-fit: contain;"  src="${images + urunBilgisi.urun_resmi}" alt="food">
                </div>
                <div class="right">
                    <div class="top">
                        <div class="info">
                            <div class="title">${urunBilgisi.urun_adi}</div>
                            <div class="description">${
                              icindekiler
                            }</div>
                        </div>
                    </div>
                    <div class="summary">
                        <div  class="price"><span>${parsedPrice}</span><span class="currency">&#8378;</span></div>
                        <div class="quantity-zone">

                        <span style="padding: 3px;" class="btn-decrement">
                        <svg  style="margin-top: -4px;" width="14" height="4" viewBox="0 0 28 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 2H26" stroke="#18181C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                        </span>

                            <span style="padding:8px;" id="urun_adeti">${
                              urun.adet
                            }</span>

                            <span style="padding: 3px;" class="btn-increment">
                            <svg style="margin-top: -4px;" width="14" height="14" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 14H26" stroke="#18181C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M14 26V2" stroke="#18181C" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                          </svg>
                          </span>

                        </div>
                    </div>
                </div>
                <button class="btn btn-trash sepetten-cikar" data-urun_id="` +
                        urunBilgisi.id +
                        `" data-index="` +
                        i +
                        `"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="29" viewBox="0 0 48 52" fill="none">
                <path d="M45.658 11.5518C37.518 10.7598 29.3291 10.3518 21.1646 10.3518C16.3246 10.3518 11.4846 10.5918 6.64463 11.0718L1.65796 11.5518" stroke="#FC4843" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.1005 9.128L15.6382 5.984C16.0294 3.704 16.3227 2 20.4538 2H26.8582C30.9894 2 31.3071 3.8 31.6738 6.008L32.2116 9.128" stroke="#FC4843" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M40.4027 19.136L38.8138 43.304C38.5449 47.072 38.3249 50 31.5049 50H15.8116C8.9916 50 8.7716 47.072 8.50271 43.304L6.91382 19.136" stroke="#FC4843" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M19.575 36.8H27.7149" stroke="#FC4843" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17.5469 27.2H29.7691" stroke="#FC4843" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg></button>
            </div>
        `;
                    let satirFiyat = urunBilgisi.fiyat.replace(",", ".") * urun.adet;
                    parsedPrice = satirFiyat.toString().split(".");
                    fisHTML = `<div class="item">
                <div class="name">${
                  urun.adet + "x " + urunBilgisi.urun_adi
                }</div>
                <div class="price">${
                  parsedPrice[0] + "</span>," + (parsedPrice[1] == undefined ? "00":parsedPrice[1])
                } &#8378;</div>
            </div>`;

                    fisListesi.append(fisHTML);
                    sepetListesi.append(sepetOgeHTML);

                    fishBilgi.push({
                        "adet": urun.adet,
                        "urun_ad": urunBilgisi.urun_adi,
                        "fiyat": parsedPrice[0] + "," + (parsedPrice[1] == undefined ? "00" : parsedPrice[1])
                    })
                }


                // Toplam fiyatı güncelle
                let price = toplamFiyat.toFixed(2).split(".");
                $(".toplam-fiyat").html(
                    "<span>" + price[0] + "</span>," + price[1][0] + "" + price[1][1] + "₺"
                );

                // ürün sayısını güncelle
                $(".toplam-urun").text(toplamUrun);


                $(".tutar").text(nf.format(price[0]) + "," + price[1] + "₺");
            }

            function tumUrunler(data, images) {
                // ürünleri yükle
                let products,
                    urunHTML,
                    menuHTML,
                    parsePrice,
                    modals,
                    urunLimit = 0,
                    categoryName;
                Object.values(data.urunler).forEach((urun, key) => {
                    let ustKategoriKey = key;
                    Object.values(urun).forEach((altKategoriDetay, altKategoriKey) => {
                        urunLimit = 0;
                        modals = [];
                        products = [];
                        Object.values(altKategoriDetay).forEach((urunDetay, urunKey) => {
                            if (urunLimit != 3) {
                                urunLimit++;
                                categoryName =
                                    data.altKategoriler[ustKategoriKey][altKategoriKey].name;
                                parsePrice = nf.format(urunDetay.fiyat).split(",");
                                urunHTML = urunTasarim(
                                    (id = urunDetay.id),
                                    (key = urunKey),
                                    (dosyaYolu = images),
                                    (resim = urunDetay.urun_resmi),
                                    (isim = urunDetay.urun_adi),
                                    (icindekiler = urunDetay.urun_icerik),
                                    (parsePrice0 = parsePrice[0]),
                                    (parsePrice1 = parsePrice[1]),
                                    (ustKategoriKey = ustKategoriKey),
                                    (altKategoriKey = altKategoriKey)
                                );
                                modalHTML = popupTasarim(
                                    (id = urunDetay.id),
                                    (key = urunKey),
                                    (dosyaYolu = images),
                                    (resim = urunDetay.urun_resmi),
                                    (isim = urunDetay.urun_adi),
                                    (icindekiler = urunDetay.urun_icerik),
                                    (parsePrice0 = parsePrice[0]),
                                    (parsePrice1 = parsePrice[1]),
                                    (ekAd = urunDetay.ek_ad),
                                    (ekIcerik = urunDetay.ek_icerik),
                                    (ustKategoriKey = ustKategoriKey),
                                    (altKategoriKey = altKategoriKey)
                                );
                                products.push(urunHTML);
                                modals.push(modalHTML);
                            }
                        });
                        if (products.length != 0) {
                            menuHTML = urunDivTasarim(
                                (kategoriAdi = categoryName),
                                (urunler = products),
                                (ustKategoriKey = ustKategoriKey),
                                (altKategoriKey = altKategoriKey)
                            );
                            $(".categories").append(menuHTML);
                            $(".all-modals").append(modals.join("\n"));

                        }

                    });
                });
            }

            function updateSepetButonlari() {
                $(".sepete-ekle").each(function() {
                    let el = $(this);
                    let kategoriKey = el.data("kategori");
                    let altKey = el.data("alt");
                    let urunKey = el.data("id");
                    let sepetteVarMi = false;
                    for (let i = 0; i < sepet.length; i++) {
                        if (
                            sepet[i].kategoriKey === kategoriKey &&
                            sepet[i].altKey === altKey &&
                            sepet[i].urunKey === urunKey
                        ) {
                            sepetteVarMi = true;
                            break;
                        }
                    }

                    if (sepetteVarMi) {
                        el.addClass("active");
                    } else {
                        el.removeClass("active");
                    }
                });
            }

            function popupTasarim(id, key, dosyaYolu, resim, isim, icindekiler, parsePrice0, parsePrice1, ekBaslik,
                ekIcerik,
                ustKategoriKey, altKategoriKey) {
                return `<div class="popup-container closePopup" id="foodModalDetay_${id}">
            <div class="popup food-modal" id="popup-${id}">
                <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-scrollable">
                    <div class="modal-content" style="max-height: 85vh;">
                       <div style="display: block;" class="modal-header">
                       <div class="food-top">
                       <img style="width: 80px; height: 80px;object-fit: contain;" src="${dosyaYolu}${resim}" alt="food">
                      <div class="food-info">
                          <div class="title">${isim}</div>
                      </div>
                      <div class="price">
                        <span>${parsePrice0}</span>,${parsePrice1 == undefined ? "00" : parsePrice1} ₺
                      </div>
                   </div>
                </div>
                        <div class="modal-body">

                            <div class="food-item">
                                <div class="title">Hakkında</div>
                                <div class="description">${icindekiler}</div>
                            </div>
                            <div class="food-item mb-5">
                                <div class="title">${ekAd == null ? "" : ekAd}</div>
                                <div class="description">${ekIcerik == null ? "": ekIcerik}</div>
                            </div>

                        </div>
                        <div style="padding: 0.5rem;" class="modal-footer">
                        <button class="btn w-100 p-3 mt-3 sepete-ekle btn-red"
                        data-urun_detay_id="${id}"
                        data-kategori="${ustKategoriKey}"
                        data-alt="${altKategoriKey}"
                        data-id="${key}">Sepete Ekle
                    </button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).on("click", "#foodModal_${id}", function () {
            location.hash = "urunDetay";
                $("body").css("overflow-y", "hidden");
                $("#foodModalDetay_${id}").show();
                setTimeout(function () {
                    $(".popup.food-modal#popup-${id}").css("transform", "translateY(0)");
                }, 0);
            });
        <\/script>`;
            }

            function urunTasarim(
                id,
                key,
                dosyaYolu,
                resim,
                isim,
                icindekiler,
                parsePrice0,
                parsePrice1,
                ustKategoriKey,
                altKategoriKey
            ) {
                return `
        <div class="menu-item">
            <div class="item-img">
           <div style="position: relative;">
            <img style="width: 80px; height: 80px;object-fit: contain;" src="${dosyaYolu}${resim}" alt="urun-gorsel">
           <span class="imgRenk">
            </span>

            </div>
            </div>
            <a class="item-info" id="foodModal_${id}">
                <div class="title">${isim}</div>
                <div class="content">${icindekiler}</div>
            </a>
            <div class="item-action">
                <button class="btn btn-sm btn-plus sepete-ekle artiikon" data-urun_id="${id}" data-kategori="${ustKategoriKey}" data-alt="${altKategoriKey}" data-id="${key}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"></path>
                    </svg>
                </button>
                <div class="price">
                    <b>${parsePrice0}</b>,<span style="font-size: 12px;">${parsePrice1 == undefined ? "00" : parsePrice1} &#8378</span>
                </div>
            </div>
        </div>
    `;
            }

            function urunDivTasarim(kategoriAdi, urunler, ustKategoriKey, altKategoriKey) {
                return `
        <div class="category mb-5">
            <div class="my-4 category-title">${kategoriAdi}</div>
            <div class="menu-list">${urunler.join("\n")}</div>
            <button class="btn btn-load" data-parent="${ustKategoriKey}" data-category="${altKategoriKey}" data-index="3">
                <div>Daha Fazla</div>
                <div class="arrow">
                    <svg width="25" height="15" viewBox="0 0 42 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.7188 1.60364L41.001 15.6036L26.7187 29.6036" stroke="#28303F" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1.00098 15.6039L40.6006 15.6039" stroke="#28303F" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </button>
        </div>`;
            }
        </script>

    </footer>



</body>

</html>
