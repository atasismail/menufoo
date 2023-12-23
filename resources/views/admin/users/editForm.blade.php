<div class="container" style="margin-top: 1em;">
    <!-- Sign up form -->
    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <!-- Sign up card -->
        <div class="card person-card">
            <div class="card-body"> <img id="" class="person-img" src="/images/edit.png"
                    style="left: 50%;   top: -5em;  margin-left: -5em;">
                <br><br>
                <div class="row">
                    <div style="margin-top: -25px;" class="form-group col-md-3">
                        <br>
                        <label class="col-form-label">Yüklü Resim </label>
                        <br>
                        <img width="100" src="/images/users/{{ $user->user_file }} " alt="">
                    </div>
                    <div style="margin-top: -25px;" class="form-group col-md-3">
                        <br>
                        <label class="col-form-label">Resim Seç</label>
                        <input name="user_file" type="file" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Adı Soyadı</label>
                        <input id="" type="text" class="form-control" value="{{ $user->displayName }}"
                            name="displayName">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">E MAİL </label>
                        <input id="" type="text" class="form-control" value="{{ $user->email }}"
                            name="email">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Telefon Numarası </label>
                        <input id="" type="text" class="form-control" value="{{ $user->tel_no }}"
                            name="tel_no">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="col-form-label">Banlı mı ?</label>
                        <br>
                        <select name="active" class="form-control">
                            <option {{ $user->active == '1' ? "selected=''" : '' }} value="1">Hayır</option>
                            <option {{ $user->active == '0' ? "selected=''" : '' }} value="0">
                                Evet
                            </option>
                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <label class="col-form-label">APİ TOKEN</label>
                        <small>Apiyi Değiştirmek İstemiyorsanız Dokunmayın</small>
                        <input inputmode="kana" name="apiToken" id="apiToken" type="text" class="form-control"
                            value="{{ $user->apiToken }}">
                    </div>



                    <input type="hidden" name="old_file" value="{{ $user->user_file }}">

                    <script>
                        CKEDITOR.replace('editor1');
                    </script>
                </div>
            </div>
        </div>

        <div style="margin-top: 1em;">
            <button type="submit" class="btn btn-dark btn-lg btn-block">DÜZENLE</button>
        </div>
    </form>
</div>
<style>
    body {
        background-color: #e9ebee;
    }

    .card {
        margin-top: 1em;
    }

    /* IMG displaying */
    .person-card {
        margin-top: 5em;
        padding-top: 5em;
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
