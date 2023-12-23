<div class="container" style="margin-top: 1em;">
    <!-- Sign up form -->
    <form action="{{ route('firma.store') }}" method="post" enctype="multipart/form-data">

        @csrf
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">
                <br>

                <center>
                    <i style="font-size: 100px; color: #3a3a6f;" class="fa-solid fa-store fa-2xl"></i>
                </center>

                <br><br>

                <div class="row">


                    <div style="margin-top: -25px;" class="form-group col-md-6">
                        <br>

                        <label class="col-form-label">Logo Seç</label>
                        <span style="color: red;" class="badge rounded-pill ">*Zorunlu</span>
                        <input name="firma_logo" type="file" accept="image/*" class="form-control">
                    </div>


                    <div class="form-group col-md-6">
                        <label class="col-form-label">Firma Adı</label>
                        <span style="color: red;" class="badge rounded-pill ">*Zorunlu</span>
                        <input id="" type="text" class="form-control" value="" name="firma_adi"
                            required>
                    </div>

                    <div class="form-group col-md-6">

                        <label class="col-form-label">İletişim Numarası</label>
                        <span style="color: darkblue;" class="badge rounded-pill ">*Firmaya Özel numara
                            Değiştirebilirsiniz</span>
                        <input id="" type="number" class="form-control" value="{{ Auth::user()->tel_no }}"
                            name="numara">
                    </div>




                </div>

            </div>
        </div>

        <div style="margin-top: 1em;">
            <button type="submit" class="btn btn-dark btn-lg btn-block">EKLE</button>
        </div>
    </form>
</div>


<style>
    body {
        background-color: #e9ebee;
    }


    .person-card .card-title {
        text-align: center;
    }

    .person-card .person-img {
        width: 10em;
        position: absolute;
        border-radius: 100%;
        overflow: hidden;
        background-color: white;
    }
</style>
