@extends('yonetim.layout')
@section('content')
    <script type="text/javascript" src="https://unpkg.com/qr-code-styling@1.5.0/lib/qr-code-styling.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.0/jszip.min.js"></script>

    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <a href="{{ route('temalarim.tema', $id) }}"><button class="btn btn-primary" type="submit">Geri
                        Git</button></a>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"> QrKodlarım</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div align="right">
                            <div id="indir" class="btn btn-success">Toplu İndir</div>
                        </div>
                        <div style="text-align:center;" class="qrcodlar row">
                        </div>
                        <script>
                            @json($masa).forEach(element => {
                                $('.qrcodlar').append(`
                                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3  col-xxl-2">
                                <b>${element.masa_adi}</b>
                                <br>
                                <div style="border-style: dashed;"  id="qrcode${element.id}">
                                </div>
                                </div>
                                <script>
                                    const qrCode${element.id} = new QRCodeStyling({
                                    "width": 300,
                                    "height": 300,
                                    "data": "https://menufoo.site/test/3/1/${element.masa_adi}",
                                    "margin": 0,
                                    "qrOptions": {
                                        "typeNumber": "0",
                                        "mode": "Byte",
                                        "errorCorrectionLevel": "L"
                                    },

                                    "dotsOptions": {
                                        "type": "extra-rounded",
                                        "color": "#000000"
                                    },
                                    "backgroundOptions": {
                                        "color": "transparent",
                                        "gradient": null
                                    },

                                    "dotsOptionsHelper": {
                                        "colorType": {
                                            "single": true,
                                            "gradient": false
                                        },
                                    },
                                    "cornersSquareOptions": {
                                        "type": "extra-rounded",
                                        "color": "#000000",
                                        "gradient": null
                                    },
                                    "cornersDotOptions": {
                                        "type": "dot",
                                        "color": "#000000"
                                    },


                                });

                                qrCode${element.id}.append(document.getElementById("qrcode${element.id}"));

                             <\/script>

                                `);

                            });

                            $('#indir').click(function(e) {
                                @json($masa).forEach(element => {
                                    "qrCode" + element.id.download({
                                        name: "qr",
                                        extension: "svg"
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
