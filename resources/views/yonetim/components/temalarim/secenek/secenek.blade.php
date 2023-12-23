@extends('yonetim.layout')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>
    <style>
        .sil {
            position: absolute;
            right: 30px;
            color: red;

        }

        .duzenle {
            position: absolute;
            right: 60px;
            color: orange;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row p-3">

                <div class="col-6" style="text-align: start;">
                    <button class="btn btn-primary" onclick="window.history.back()" type="submit">Geri Git</button>
                </div>
            </div>
            <div class="col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"> Seçenekler</h3>
                    </div>

                    <div style="card-body">



                        <div class="row">

                            <div class="col-12 col-md-7 col-lg-9">

                                @if (count($secenek) != 0)
                                    <style>
                                        ._select_color {
                                            font-size: 20px;
                                            padding: 10px 12px;
                                            font-weight: 300;
                                            line-height: 28px;
                                            border-radius: 4px;
                                            border: 1px solid #ccc;
                                            -webkit-appearance: none;
                                            width: 100%;
                                            height: auto;
                                            box-shadow: none;
                                            text-align: left;
                                            background-image: none;
                                            color: #796652;
                                            background: white;
                                        }

                                        ._select_color_drop {
                                            margin: 0;
                                            padding: 0;
                                            border-top-left-radius: 0;
                                            border-top-right-radius: 0;
                                            top: 99%;
                                            border-top: 0;
                                            width: 100%;
                                        }

                                        ._select_color_drop>li {
                                            display: inline-block;
                                            padding: 7px;
                                            border-right: 1px solid rgba(192, 192, 192, 0.55);
                                            cursor: pointer;
                                            float: left;
                                        }

                                        ._select_color_drop>li>.color,
                                        .btn>span.color {
                                            width: 25px;
                                            height: 25px;
                                            border-radius: 4px;
                                            float: left;
                                        }

                                        .btn>span.color {
                                            margin-right: 10px
                                        }

                                        .btn .caret {
                                            float: right;
                                            border-top: 7px solid;
                                            font-size: 28px;
                                            padding-top: 5px;
                                            vertical-align: middle;
                                            position: absolute;
                                            right: 20px;
                                            border-left: 5px solid transparent;
                                            border-right: 5px solid transparent;
                                            top: 20px;
                                        }


                                        /* SELECT RENK */
                                        ._select_color_drop>li>.kirmizi,
                                        .btn._select_color>span.kirmizi {
                                            background-color: #fc4843;
                                        }

                                        ._select_color_drop>li>.acik_mavi,
                                        .btn._select_color>span.acik_mavi {
                                            background-color: #4398fc;
                                        }

                                        ._select_color_drop>li>.mor,
                                        .btn._select_color>span.mor {
                                            background-color: #7e43fc;
                                        }

                                        ._select_color_drop>li>.turuncu,
                                        .btn._select_color>span.turuncu {
                                            background-color: #fc5b28;
                                        }

                                        ._select_color_drop>li>.pembe,
                                        .btn._select_color>span.pembe {
                                            background-color: #fc2874;
                                        }

                                        ._select_color_drop>li>.kapali_mor,
                                        .btn._select_color>span.kapali_mor {
                                            background-color: #6629bd;
                                        }

                                        ._select_color_drop>li>.turkuaz,
                                        .btn._select_color>span.turkuaz {
                                            background-color: #286ace;
                                        }

                                        ._select_color_drop>li>.siyah,
                                        .btn._select_color>span.siyah {
                                            background-color: #000;
                                        }

                                        ._select_color_drop>li>.koyu_bordo,
                                        .btn._select_color>span.koyu_bordo {
                                            background-color: #4b0e0c;
                                        }

                                        ._select_color_drop>li>.koyu_menekse,
                                        .btn._select_color>span.koyu_menekse {
                                            background-color: #281c72;
                                        }

                                        ._select_color_drop>li>.petrol_yesili,
                                        .btn._select_color>span.petrol_yesili {
                                            background-color: #304b0c;
                                        }


                                        ._select_color_drop>li>.koyu_fusya,
                                        .btn._select_color>span.koyu_fusya {
                                            background-color: #7d2c5d;
                                        }

                                        ._select_color_drop>li>.koyu_mavi,
                                        .btn._select_color>span.koyu_mavi {
                                            background-color: #2c5b7d;
                                        }

                                        ._select_color_drop>li>.koyu_cyan,
                                        .btn._select_color>span.koyu_cyan {
                                            background-color: #2c7d60;
                                        }

                                        ._select_color_drop>li>.zeytin_yesili,
                                        .btn._select_color>span.zeytin_yesili {
                                            background-color: #797a2b;
                                        }

                                        ._select_color_drop>li>.dark_mavi,
                                        .btn._select_color>span.dark_mavi {
                                            background-color: #123657;
                                        }
                                    </style>
                                    <br>
                                    <div class="container">
                                        <div class="row">
                                            <div class='col-md-6'>
                                                <div class="form-group">
                                                    <label for="" class="">Menu Rengi</label>
                                                    <div class="dropdown">
                                                        <button class="btn _select_color dropdown-toggle" type="button"
                                                            id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">{{ $secenek[0]->color_text }}<span
                                                                class="caret _right">
                                                            </span>
                                                            <span _text_display="{{ $secenek[0]->color_text }}"
                                                                _hex_renk="{{ $secenek[0]->hex_renk }}"
                                                                _garson_buton_renk="{{ $secenek[0]->garson_buton_renk }}"
                                                                _ust_kutu_renk="{{ $secenek[0]->ust_kutu_renk }}"
                                                                style=" background-color: {{ $secenek[0]->hex_renk }};"
                                                                class="color">
                                                            </span>
                                                        </button>
                                                        <ul class="dropdown-menu _select_color_drop"
                                                            aria-labelledby="dropdownMenu1">
                                                            <li>
                                                                <span _text_display="Kırmızı" _hex_renk="#fc4843"
                                                                    _garson_buton_renk="#fbcd25"
                                                                    _ust_kutu_renk="rgba(40, 48, 63, 0.06);"
                                                                    style=" background-color: #fc4843;" class="color">
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Açık Mavi" _hex_renk="#4398fc"
                                                                    _garson_buton_renk="#4398fc"
                                                                    _ust_kutu_renk="rgba(67, 152, 252, 0.06);"
                                                                    style=" background-color: #4398fc;" class="color">
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Mor" _hex_renk="#7e43fc"
                                                                    _garson_buton_renk="#7e43fc"
                                                                    _ust_kutu_renk="rgba(126, 67, 252, 0.06);"
                                                                    style=" background-color: #7e43fc;" class="color">
                                                                </span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Turuncu" _hex_renk="#fc5b28"
                                                                    _garson_buton_renk="#fc5b28"
                                                                    _ust_kutu_renk="rgba(252, 91, 40, 0.06);"
                                                                    style=" background-color: #fc5b28;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Pembe" _hex_renk="#fc2874"
                                                                    _garson_buton_renk="#fc2874"
                                                                    _ust_kutu_renk="rgba(252, 91, 40, 0.06);"
                                                                    style=" background-color: #fc2874;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Kapalı Mor" _hex_renk="#6629bd"
                                                                    _garson_buton_renk="#6629bd"
                                                                    _ust_kutu_renk="rgba(102, 41, 189, 0.06);"
                                                                    style=" background-color: #6629bd;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Turkuaz" _hex_renk="#286ace"
                                                                    _garson_buton_renk="#286ace"
                                                                    _ust_kutu_renk="rgba(40, 106, 206, 0.06);"
                                                                    style=" background-color: #286ace;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Siyah" _hex_renk="#000"
                                                                    _garson_buton_renk="#000"
                                                                    _ust_kutu_renk="rgba(0, 0, 0, 0.06);"
                                                                    style=" background-color: #000;" class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="koyu bordo" _hex_renk="#4b0e0c"
                                                                    _garson_buton_renk="#4b0e0c"
                                                                    _ust_kutu_renk="rgba(75, 14, 12, 0.06);"
                                                                    style=" background-color: #4b0e0c;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Koyu Menekşe" _hex_renk="#281c72"
                                                                    _garson_buton_renk="#281c72"
                                                                    _ust_kutu_renk="rgba(40, 28, 114, 0.06);"
                                                                    style=" background-color: #281c72;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Petrol Yeşili" _hex_renk="#304b0c"
                                                                    _garson_buton_renk="#304b0c"
                                                                    _ust_kutu_renk="rgba(48, 75, 12,0.06);"
                                                                    style="background-color: #304b0c;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Koyu Fusya" _hex_renk="#7d2c5d"
                                                                    _garson_buton_renk="#7d2c5d"
                                                                    _ust_kutu_renk="rgb(125, 44, 93, 0.06);"
                                                                    style="background-color: #7d2c5d;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Koyu Mavi" _hex_renk="#2c5b7d"
                                                                    _garson_buton_renk="#2c5b7d"
                                                                    _ust_kutu_renk="rgba(44, 91, 125,0.06);"
                                                                    style="background-color: #2c5b7d;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Koyu Cyan" _hex_renk="#2c7d60"
                                                                    _garson_buton_renk="#2c7d60"
                                                                    _ust_kutu_renk="rgba(44, 125, 96,0.06);"
                                                                    style="background-color: #2c7d60;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Zeytin Yeşili" _hex_renk="#797a2b"
                                                                    _garson_buton_renk="#2c7d60"
                                                                    _ust_kutu_renk="rgba(121, 122, 43, 0.06);"
                                                                    style="background-color: #797a2b;"
                                                                    class="color"></span>
                                                            </li>
                                                            <li>
                                                                <span _text_display="Dark Mavi" _hex_renk="#123657"
                                                                    _garson_buton_renk="#123657"
                                                                    _ust_kutu_renk="rgba(18, 54, 87, 0.06);"
                                                                    style="background-color: #123657;" class="color">
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <script>
                                        $(document).ready(function() {
                                            $('._select_color_drop li').on('click', function() {
                                                var color_text = $(this).find('span').attr('_text_display');
                                                var hex_renk = $(this).find('span').attr('_hex_renk');
                                                var garson_buton_renk = $(this).find('span').attr('_garson_buton_renk');
                                                var ust_kutu_renk = $(this).find('span').attr('_ust_kutu_renk');

                                                var elemnt = $(this).closest('._select_color_drop').prev();

                                                elemnt.find('span.color').remove();
                                                $(this).find('span').clone().appendTo(elemnt);

                                                var contents = elemnt.contents();
                                                if (contents.length > 0) {
                                                    if (contents.get(0).nodeType == Node.TEXT_NODE) {
                                                        elemnt.html(color_text).append(contents.slice(1));
                                                    }
                                                }

                                                if ($('[name=_color]').val() == undefined) {
                                                    elemnt.next().append("<input type='hidden' name='_color' value='" + color_text +
                                                        "'>");
                                                } else {
                                                    $('[name=_color]').val(color_text);
                                                }

                                                $.ajax({
                                                    type: "Post",
                                                    url: "renk",
                                                    data: JSON.stringify({
                                                        color_text: color_text,
                                                        hex_renk: hex_renk,
                                                        garson_buton_renk: garson_buton_renk,
                                                        ust_kutu_renk: ust_kutu_renk,
                                                        id: {{ $id }},
                                                    }),
                                                    contentType: "application/json; charset=utf-8",

                                                    success: function(response) {

                                                        console.log(response);
                                                        if (response == "ok") {

                                                            $("#menufo_site").attr("src", $("#menufo_site").attr("src"));
                                                            // console.log(fishBilgi);
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Başarıyla Değiştirildi'
                                                            })
                                                            // .then(() => {
                                                            //     location.reload();

                                                            // });
                                                        } else {
                                                            Swal.fire({
                                                                icon: 'error',
                                                                title: 'Hata Oluştu'
                                                            })
                                                        }

                                                    }
                                                });
                                            });
                                        });
                                    </script>




                                    <div class="container card">
                                        <div class="row">
                                            <div class="col-7">
                                                <label for="yazi_hizi" class="form-label"> Yazma hızını</label>
                                                <input type="range" class="form-range" id="yazi_hizi"
                                                    value="{{ $secenek[0]->yazi_hizi }}" min="0" max="100">
                                            </div>
                                            <div class="col-5"
                                                style="padding: 0;margin: 0;text-align: center; margin-top: 20px;align-items: center;display: flex;justify-content: space-evenly;">
                                                <span id="yazi_hizi_deger">{{ $secenek[0]->yazi_hizi }}</span>
                                                <button class="btn btn-primary" id="yazi_hizi_kaydet">Kaydet</button>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-7">
                                                <label for="yazi_silme_hizi" class="form-label">Silme hızı</label>
                                                <input type="range" class="form-range" id="yazi_silme_hizi"
                                                    value="{{ $secenek[0]->yazi_silme_hizi }}" min="0"
                                                    max="100">
                                            </div>
                                            <div class="col-5"
                                                style="padding: 0;margin: 0;text-align: center; margin-top: 20px;align-items: center;display: flex;justify-content: space-evenly;">
                                                <span id="yazi_silme_hizi_deger">{{ $secenek[0]->yazi_silme_hizi }}</span>
                                                <button class="btn btn-primary"
                                                    id="yazi_silme_hizi_kaydet">Kaydet</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-7">
                                                <label for="yazi_silme_bekleme" class="form-label">Silme sonrası bekleme
                                                    süresi</label>
                                                <input type="range" class="form-range" id="yazi_silme_bekleme"
                                                    value="{{ $secenek[0]->yazi_silme_bekleme }}" min="0"
                                                    max="3000">
                                            </div>
                                            <div class="col-5"
                                                style="padding: 0;margin: 0;text-align: center; margin-top: 20px;align-items: center;display: flex;justify-content: space-evenly;">
                                                <span
                                                    id="yazi_silme_bekleme_deger">{{ $secenek[0]->yazi_silme_bekleme }}</span>
                                                <button class="btn btn-primary"
                                                    id="yazi_silme_bekleme_kaydet">Kaydet</button>
                                            </div>
                                        </div>

                                        <div class="row">


                                            <div class="col-7" style="padding: 0;margin: 0; margin-top: 20px;">
                                                <label style="margin-left: 15px;" for="yazi_dongu"
                                                    class="form-label">Döngüye
                                                    Girilsinmi</label>
                                            </div>
                                            <div class="col-5"
                                                style="padding: 0;margin: 0;text-align: center; margin-top: 20px;align-items: center;display: flex;justify-content: space-evenly;">
                                                <label class="switch">

                                                    <input id="yazi_dongu" type="checkbox"
                                                        {{ $secenek[0]->yazi_dongu == '1' ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>


                                        </div>


                                    </div>
                                @endif

                                <div class="container ">
                                    <label for="" class="">Ön Yazılar</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="onYazi"
                                            placeholder="Yeni ÖnYazı ekle">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" id="addTask">Ekle</button>
                                        </div>
                                    </div>

                                    <ul class="list-group" id="taskList">

                                    </ul>
                                    <br>
                                </div>


                            </div>
                            <div class="col-12 col-md-5 col-lg-3">
                                <div style="background-color: #E5EEEC; padding: 15px;" class="container ">
                                    <iframe id="menufo_site"
                                        src="https://menufoo.site/test/{{ Auth::user()->id }}/{{ $id }}/1"
                                        style="width: 100%; height: 70vh;border-radius: 15px;" frameborder="0"
                                        sandbox="allow-same-origin allow-scripts allow-popups allow-forms"></iframe>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        var metin = "{{ count($secenek) == 0 ? '' : $secenek[0]->metinler }}".split("-");

        if (metin != "") {
            metin.forEach(element => {
                $("#taskList").append('<li class="list-group-item"><span class="onYazi">' + element +
                    '</span> <button class="btn btn-danger btn-sm float-right deleteTask">Sil</button><button class="btn btn-warning btn-sm float-right editTask mr-2">Düzenle</button></li>'
                );
            });
        }


        $("#addTask").click(function() {
            var onYazi = $("#onYazi").val();
            if (onYazi !== "") {

                $("#taskList").append('<li class="list-group-item"><span class="onYazi">' + onYazi +
                    '</span> <button class="btn btn-danger btn-sm float-right deleteTask">Sil</button><button class="btn btn-warning btn-sm float-right editTask mr-2">Düzenle</button></li>'
                );

                $.ajax({
                    type: "Post",
                    url: "onYaziEkle",
                    data: JSON.stringify({
                        onYazi: onYazi,
                        id: {{ $id }},
                    }),
                    contentType: "application/json; charset=utf-8",

                    success: function(response) {


                        if (response == "ok") {
                            // console.log(fishBilgi);
                            Swal.fire({
                                    icon: 'success',
                                    title: 'Başarıyla Ön Yazı Eklendi'
                                })
                                .then(() => {
                                    location.reload();

                                });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Ön Yazı Eklerken Hata Oluştu'
                            })
                        }

                    }
                });


                $("#onYazi").val("");
            }
        });

        // Görev silme
        $("#taskList").on("click", ".deleteTask", function() {

            $.ajax({
                type: "Post",
                url: "onYaziSil",
                data: JSON.stringify({
                    onYazi: $(this).closest("li").find(".onYazi").text().trim(),
                    id: {{ $id }},
                }),
                contentType: "application/json; charset=utf-8",

                success: function(response) {
                    console.log(response);

                    if (response == "ok") {
                        // console.log(fishBilgi);
                        Swal.fire({
                                icon: 'success',
                                title: 'Başarıyla Ön Yazı Silindi'
                            })
                            .then(() => {
                                location.reload();

                            });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Ön Yazı Silinirken Hata Oluştu'
                        })
                    }

                }
            });
            $(this).closest("li").remove();
        });

        // Görev düzenleme
        $("#taskList").on("click", ".editTask", function() {
            currentTask = $(this).closest("li").find(".onYazi").text().trim(),
                $("#onYazi").val(currentTask);

            $.ajax({
                type: "Post",
                url: "onYaziDuzenle",
                data: JSON.stringify({
                    onYazi: currentTask,
                    id: {{ $id }},
                }),
                contentType: "application/json; charset=utf-8",

            });
            $(this).closest("li").remove();

        });


        // Range

        var yazi_hizi = $('#yazi_hizi');
        var yazi_hizi_deger = $('#yazi_hizi_deger');
        // yazi_hizi_deger.text($("50").val());

        yazi_hizi.on('input', function() {
            yazi_hizi_deger.text($(this).val());
        });
        $('#yazi_hizi_kaydet').on('click', function() {
            var yazi_hizi_val = yazi_hizi.val();



            $.ajax({
                type: "Post",
                url: "yazi_hizi",
                data: JSON.stringify({
                    yazi_hizi: yazi_hizi_val,
                    id: {{ $id }},
                }),
                contentType: "application/json; charset=utf-8",

                success: function(response) {

                    console.log(response);
                    if (response == "ok") {

                        $("#menufo_site").attr("src", $("#menufo_site").attr("src"));
                        // console.log(fishBilgi);
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarıyla Değiştirildi'
                        })
                        // .then(() => {
                        //     location.reload();

                        // });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata Oluştu'
                        })
                    }

                }
            });







        });

        var yazi_silme_hizi = $('#yazi_silme_hizi');
        var yazi_silme_hizi_deger = $('#yazi_silme_hizi_deger');


        yazi_silme_hizi.on('input', function() {
            yazi_silme_hizi_deger.text($(this).val());
        });
        $('#yazi_silme_hizi_kaydet').on('click', function() {
            var yazi_silme_hizi_val = yazi_silme_hizi.val();

            $.ajax({
                type: "Post",
                url: "yazi_silme_hizi",
                data: JSON.stringify({
                    yazi_silme_hizi: yazi_silme_hizi_val,
                    id: {{ $id }},
                }),
                contentType: "application/json; charset=utf-8",

                success: function(response) {

                    console.log(response);
                    if (response == "ok") {

                        $("#menufo_site").attr("src", $("#menufo_site").attr("src"));
                        // console.log(fishBilgi);
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarıyla Değiştirildi'
                        })
                        // .then(() => {
                        //     location.reload();

                        // });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata Oluştu'
                        })
                    }

                }
            });

        });


        var yazi_silme_bekleme = $('#yazi_silme_bekleme');
        var yazi_silme_bekleme_deger = $('#yazi_silme_bekleme_deger');


        yazi_silme_bekleme.on('input', function() {
            yazi_silme_bekleme_deger.text($(this).val());
        });
        $('#yazi_silme_bekleme_kaydet').on('click', function() {
            var yazi_silme_bekleme_val = yazi_silme_bekleme.val();

            $.ajax({
                type: "Post",
                url: "yazi_silme_bekleme",
                data: JSON.stringify({
                    yazi_silme_bekleme: yazi_silme_bekleme_val,
                    id: {{ $id }},
                }),
                contentType: "application/json; charset=utf-8",

                success: function(response) {

                    console.log(response);
                    if (response == "ok") {

                        $("#menufo_site").attr("src", $("#menufo_site").attr("src"));
                        // console.log(fishBilgi);
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarıyla Değiştirildi'
                        })
                        // .then(() => {
                        //     location.reload();

                        // });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata Oluştu'
                        })
                    }

                }
            });


        });

        $("#yazi_dongu").change(function() {
            var isChecked = $(this).prop("checked");

            $.ajax({
                type: "Post",
                url: "yazi_dongu",
                data: JSON.stringify({
                    yazi_dongu: isChecked,
                    id: {{ $id }},
                }),
                contentType: "application/json; charset=utf-8",

                success: function(response) {

                    console.log(response);
                    if (response == "ok") {

                        $("#menufo_site").attr("src", $("#menufo_site").attr("src"));
                        // console.log(fishBilgi);
                        Swal.fire({
                            icon: 'success',
                            title: 'Başarıyla Değiştirildi'
                        })
                        // .then(() => {
                        //     location.reload();

                        // });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Hata Oluştu'
                        })
                    }

                }
            });


        });
    </script>
@endsection
