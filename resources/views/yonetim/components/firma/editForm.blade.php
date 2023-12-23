<div class="container" style="margin-top: 1em;">
    <!-- Sign up form -->
    <form action="{{ route('firma.update', $firma->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body">
                <center>
                    <i style="font-size: 100px; color: #3a3a6f;" class="fa-solid fa-store fa-2xl"></i>
                </center>

                <br><br>
                <div class="row">
                    <div style="margin-top: -25px;" class="form-group col-md-6">
                        <br>
                        <label class="col-form-label">Yüklü Resim </label>
                        <br>
                        <img width="100" src="/cdn/firma/{{ $firma->firma_logo ?? 'resim.png' }} " alt="">
                    </div>


                    <div style="margin-top: -25px;" class="form-group col-md-6">
                        <br>
                        <label class="col-form-label">Logo Seç</label>
                        <input name="firma_logo" type="file" accept="image/*" class="form-control">
                    </div>


                    <div class="form-group col-md-6">
                        <label class="col-form-label">Firma Adı</label>
                        <input id="" type="text" class="form-control" value="{{ $firma->firma_adi }}"
                            name="firma_adi">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="col-form-label">İletişim Numarası</label>
                        <input id="" type="number" class="form-control" value="{{ $firma->numara }}"
                            name="numara">
                    </div>




                    <input type="hidden" name="old_file" value="{{ $firma->firma_logo }}">


                </div>
            </div>
            <div class="card-footer">
                <div style="margin-top: 1em;">
                    <button type="submit" class="btn btn-dark btn-lg btn-block">DÜZENLE</button>
                </div>
            </div>
        </div>


    </form>
</div>
<style>
    body {
        background-color: #e9ebee;
    }
</style>
