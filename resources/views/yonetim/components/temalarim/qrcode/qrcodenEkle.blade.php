<div class="container">
    <!-- Sign up form -->
    <form action="{{ route('qrcode.store', ['id' => $id]) }}" method="post" enctype="multipart/form-data">

        @csrf
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">

                <div id="qrcode">

                </div>


                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="col-12">QrCode Boyutu</label>

                        <select name="qrcode_size" class="form-control" required>
                            <option value="">QrCode Boyutu Seçiniz</option>
                            <option value="a3">A3</option>
                            <option value="a4">A4</option>
                            <option value="a5">A5</option>
                            <option value="a6">A6</option>
                            <option value="a7">A7</option>
                            <option value="a8">A8</option>
                            <option value="a9">A9</option>

                        </select>
                    </div>

                    {{-- <div class="form-group col-md-3">
                        <label class="col-12">Seçilen Resim</label>
                        <span style="color: red;" class="badge rounded-pill resimUyari">*Resim Seçilmedi</span>

                        <img width="200" id="selectedImage" src="" class="img-thumbnail">


                    </div>

                    <div style="margin-top: -25px;" class="form-group col-md-3">
                        <br>
                        <label class="col-12">Ürün Resmi Seç</label>

                        <input id="fileInput" name="urun_resmi" type="file" class="form-control" required>
                    </div> --}}









                    <div class="form-group col-md-6">
                        <label class="col-12">QrCode Sayısı</label>

                        <input id="" type="number" class="form-control" value="" name="qrcode_sayisi"
                            required>
                    </div>



                </div>

            </div>
        </div>
</div>
<div style="margin-top: 1em;">
    <button type="submit" class="btn btn-dark btn-lg btn-block">EKLE</button>
</div>
</form>


<script type="text/javascript">
    $(document).ready(function() {

        let genislik = 200;
        let yukseklik = 200;
        let icBosluk = 0;

        $('#qrGenislik').blur(function(e) {
            genislik = parseInt($(this).val());
            if (!isNaN(genislik) && genislik > 0) {
                qrCode.update({
                    width: genislik
                });
            }
        });
        $('#qrYukseklik').blur(function(e) {
            yukseklik = parseInt($(this).val());
            if (!isNaN(yukseklik) && yukseklik > 0) {
                qrCode.update({
                    height: yukseklik
                });
            }
        });


        const qrCode = new QRCodeStyling({
            width: 200,
            height: 200,
            margin: 0,
            type: "svg",
            data: "https://menufoo.com/2/2/2",
            dotsOptions: {
                color: "#BAB6AC",
                type: "extra-rounded",
            },
            cornersSquareOptions: {
                color: "#BAB6AC",
                type: "extra-rounded",
            },
            cornersDotOptions: {
                color: "#BAB6AC",
            },
        });

        qrCode.append(document.getElementById("qrcode"));

        // qrCode.download({ name: "qr", extension: "png" });
    });
</script>
