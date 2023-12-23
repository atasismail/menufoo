@extends('yonetim.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Telefon Doğrula</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="content-header">
                            <div class="container-fluid">
                                <div style="padding: 5px;" class="col-md-12">
                                    <br>
                                    <div style="border-radius: 20px;background-color: aliceblue;" class="card">
                                        <div class="card-body">
                                            İlan Eklemek ve Müşterilerinizin Size Ulaşması İçin Telefon Numaranızı Girmeniz
                                            ve Doğrulamanız
                                            Gerekir
                                        </div>
                                    </div>
                                    <div class="container">


                                        <div class="container py-5">
                                            <div class="row justify-content-center">
                                                <div class="col-md-6 col-lg-5">
                                                    <div id="phone-form">
                                                        <div class="form-group">
                                                            <label for="phone-number">Telefon Numarası</label>
                                                            <div class="input-group">
                                                                <div class="input-group-text">+90</div>
                                                                <input type="number" class="form-control" id="phone-number"
                                                                    name="phone-number" placeholder="5XX XXX XX XX"
                                                                    required>
                                                            </div>

                                                        </div>
                                                        <br>
                                                        <div style="display: none;" id="invalid-feedback"
                                                            class="alert alert-danger" role="alert">

                                                        </div>

                                                        <div style="text-align: center; display: none;"
                                                            class="form-group butonGizle">
                                                            <br>
                                                            <button id="send-code-btn"
                                                                style="border: none;display: inline-block;padding: 10px 20px;font-size: 16px; ont-weight: bold;text-align: center;text-decoration: none;border-radius: 5px;width: 92%; background-color: #FD8607; color:white"
                                                                type="button" class=" btn  btn-block">
                                                                Doğrulama Kodu Gönder
                                                            </button>

                                                        </div>
                                                    </div>
                                                    <div style="display: none;" id="invalid-code-done"
                                                        class="alert alert-danger" role="alert">
                                                        Çok Fazla Hatalı Deneme Yaptınız Lütfen Daha
                                                        Sonra Tekrar Deneyiniz.
                                                    </div>
                                                    <div id="code-form" style="display: none;">
                                                        <div class="form-group">
                                                            <div style="display: none;" id="invalid-success-feedback"
                                                                class="alert alert-success" role="alert">

                                                            </div>
                                                            <br>
                                                            <label for="verification-code">4 Haneli Doğrulama Kodu</label>
                                                            <input type="number" class="form-control"
                                                                id="verification-code" name="verification-code"
                                                                placeholder="Doğrulama kodunu girin" required>
                                                        </div>
                                                        <br>
                                                        <div style="display: none;" id="invalid-code-feedback"
                                                            class="alert alert-danger" role="alert">

                                                        </div>
                                                        <div style="text-align: center;display: none;"
                                                            class="dogrulamaGizle form-group">

                                                            <button id="verify-code-btn" data-ripple
                                                                data-ripple-theme="light"
                                                                style="border: 1px orange; width: 92%; background-color: #FD8607; color:white"
                                                                type="button" class=" btn  btn-block">
                                                                Doğrula
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            var phoneNumber;
                            $(document).ready(function() {

                                $("#phone-number").keyup(function(e) {
                                    var deger = $(this).val();
                                    var uzunluk = deger.length;
                                    if (deger.slice(0, 1) == '0') {
                                        $('#invalid-feedback').show();
                                        $('#invalid-feedback').text("Lütfen numaranın başındaki 0 değerini siliniz.");
                                        $('.butonGizle').hide();
                                    } else if (deger.slice(0, 1) !== '5') {
                                        $('#invalid-feedback').show();
                                        $('#invalid-feedback').text("Lütfen geçerli bir telefon numarası girin.");
                                        $('.butonGizle').hide();
                                    } else {
                                        $('#invalid-feedback').hide();
                                        if (uzunluk != 10) {
                                            $('#invalid-feedback').show();
                                            $('#invalid-feedback').text("Lütfen 10 haneli telefon numarası girin.");
                                            $('.butonGizle').hide();
                                        } else {
                                            document.activeElement.blur();
                                            $("input").blur();
                                            $('#invalid-feedback').hide();
                                            $('.butonGizle').show();

                                        }
                                    }


                                });


                                $("#send-code-btn").click(function() {
                                    $('#send-code-btn').prop('disabled', true);
                                    var phoneNumber = $("#phone-number").val();

                                    const data = {
                                        phone_number: phoneNumber
                                    };
                                    axios.post("dogrula", data)
                                        .then(function(response) {
                                            console.log(response.data);

                                            switch (response.data) {
                                                case "basarili":
                                                    Swal.fire(
                                                        'Başarılı',
                                                        'Telefon Numarasına Sms Gönderildi!',
                                                        'success'
                                                    );
                                                    $('#dogrulamaUyari').hide();
                                                    $("#phone-form").hide();
                                                    $("#code-form").show();
                                                    $("#invalid-success-feedback").show();
                                                    $('#invalid-success-feedback').text("0" + phoneNumber +
                                                        " Telefon Numarasına Sms Gönderildi");
                                                    break;
                                                case "numaraVar":
                                                    Swal.fire(
                                                        'Numara Kullanılıyor',
                                                        'Bu numura farklı bir kullanıcıya ait.Hesabınıza ulaşamıyorsanız veya numara size ait ise Whatsapptan iletişime geçiniz.',
                                                        'question'
                                                    )
                                                    $('#send-code-btn').prop('disabled', false);
                                                    break;
                                                case "gecersiz":


                                                    Swal.fire(
                                                        'gecersiz',
                                                        'Geçersiz Bir numara Girdiniz Lütfen kendi Numaranızı Giriniz!',
                                                        'error'
                                                    );
                                                    $('#send-code-btn').prop('disabled', false);

                                                    break;
                                                case "systemError":
                                                    Swal.fire(
                                                        'Sistem Hatası',
                                                        'Sistemde Geçici Hata Var Lütfen Daha Sonra Tekrar Deneyiniz',
                                                        'error'
                                                    );
                                                    $('#send-code-btn').prop('disabled', false);
                                                    break;

                                            }

                                        })
                                        .catch(function(error) {
                                            alertify.error(
                                                'Sistemde Geçici Hata Var Lütfen Daha Sonra Tekrar Deneyiniz'
                                            );

                                        });

                                });




                                $("#verification-code").keyup(function(e) {
                                    var deger = $(this).val();
                                    var uzunluk = deger.length;
                                    if (uzunluk != 4) {
                                        $('#invalid-code-feedback').show();
                                        $('#invalid-code-feedback').text("Lütfen 4 haneli kod girin.");
                                        $('.dogrulamaGizle').hide();
                                    } else {
                                        document.activeElement.blur();
                                        $("input").blur();
                                        $('#invalid-code-feedback').hide();
                                        $('.dogrulamaGizle').show();

                                    }

                                });



                                var hataliDeneme = 0;


                                // Verify code button click handler
                                $("#verify-code-btn").click(function() {
                                    var code = $("#verification-code").val();
                                    const data = {
                                        sms_code: code
                                    };
                                    axios.post("smsDogrula", data)
                                        .then(function(response) {
                                            if (response.data == "basarili") {
                                                window.location.href = "/yonetim";
                                            } else if (response.data == "basarisiz") {
                                                hataliDeneme++;
                                                alertify.error('Hatalı Kod Girdiniz');

                                                if ((5 - hataliDeneme) <= 0) {
                                                    $('#code-form').hide();
                                                    $('#code-form').empty();
                                                    $('#invalid-code-done').show();
                                                    hataliDeneme = 0;
                                                }
                                            } else {
                                                alertify.error(
                                                    'Sistemde Geçici Hata Var Lütfen Daha Sonra Tekrar Deneyiniz');

                                            }
                                        })
                                        .catch(function(error) {
                                            alertify.error(
                                                'Sistemde Geçici Hata Var Lütfen Daha Sonra Tekrar Deneyiniz');

                                        });
                                });
                            });
                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
@endsection
