<div class="container">
    <!-- Sign up form -->
    <form action="{{ route('urun.store', ['id' => $id]) }}" method="post" enctype="multipart/form-data">

        @csrf
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">

                <div class="row">

                    <div style="margin-bottom:25px;" class="input-group col-md-12">
                        <label class="col-12 ">Hızlı Ürün Seç</label>
                        <input id="" type="text" class="form-control" value="">
                        <span class="input-group-text"><i style="font-size: x-large;"
                                class="fa-brands fa-searchengin"></i></span>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-12">Kategori Ekle</label>

                        <select name="kategori_id" class="form-control" required>
                            <option value="">Kategori Seçiniz</option>
                            @foreach ($kategoriler as $item)
                                <option value="{{ $item->id }}">{{ $item->kategori_adi }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group col-md-3">
                        <label class="col-12">Seçilen Resim</label>
                        <span style="color: red;" class="badge rounded-pill resimUyari">*Resim Seçilmedi</span>

                        <img width="200" id="selectedImage" src="" class="img-thumbnail">


                    </div>

                    <div style="margin-top: -25px;" class="form-group col-md-3">
                        <br>
                        <label class="col-12">Ürün Resmi Seç</label>

                        <input id="fileInput" name="urun_resmi" type="file" class="form-control" required>
                    </div>





                    <div class="form-group col-md-12">
                        <label class="col-12">Ürün Adı</label>

                        <input id="" type="text" class="form-control" value="" name="urun_adi"
                            required>
                    </div>



                    <div class="form-group col-md-12">
                        <label class="col-12">Ürün İçerik</label>

                        <textarea style="width: 100%;" name="urun_icerik" id="" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-12 fiyatYaz">Ürün Fiyatı</label>

                        <input id="" type="number" min="1" step="any" class="form-control fiyat"
                            value="" name="fiyat" required>
                    </div>



                    <div class="form-group col-md-6">
                        <label class="col-12">Sıra Numarası</label>

                        <input id="" type="number" class="form-control" value="" name="sira"
                            required>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-12">Ek Başlık</label>
                        <span style="color: green;" class="badge rounded-pill ">*İsteğe Bağlı</span>
                        <input id="" type="text" class="form-control" value="" name="ek_baslik">
                    </div>


                    <div class="form-group col-md-12">
                        <label class="col-12">Ek Açıklama</label>
                        <span style="color: green;" class="badge rounded-pill ">*İsteğe Bağlı</span>
                        <br>
                        <textarea style="width: 100%;" name="ek_aciklama" id="" cols="30" rows="10"></textarea>
                    </div>


                </div>

            </div>
        </div>
</div>
<div style="margin-top: 1em;">
    <button type="submit" class="btn btn-dark btn-lg btn-block">EKLE</button>
</div>
</form>



<style>
    body {
        background-color: #e9ebee;
    }

    .card {
        margin-top: 1em;
    }
</style>

<script>
    var nf = new Intl.NumberFormat();
    $(document).ready(function() {

        $('.fiyat').keyup(function(e) {

            if ($(this).val() <= 0) {
                $('.fiyatYaz').text("Ürün Fiyatı");
            } else {
                $('.fiyatYaz').text("Ürün Fiyatı " +
                    " " + nf.format($(this).val()) + " ₺");
            }

        });

        // Dosya seçildiğinde
        $("#fileInput").change(function() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Resmi görüntüle
                    $("#selectedImage").attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
                $('.resimUyari').hide();
            }
        });
    });
</script>
