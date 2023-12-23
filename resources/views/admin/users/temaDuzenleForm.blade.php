@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">TEMA DUZENLE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('user.temaPostDuzenle', $temaBilgi->id) }}" method="post">
                            @csrf


                            <div class="card person-card">
                                <div class="card-body">
                                    <br>

                                    <center>
                                        <i style="font-size: 100px; color: #3a3a6f;" class="fa-solid fa-store fa-2xl"></i>
                                    </center>

                                    <br><br>

                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Kullanıcı Seç</label>
                                            <br>
                                            <select name="tema_id" class="form-control temaSec" required>
                                                <option value="">Tema Seç</option>
                                                @foreach ($temalar as $tema)
                                                    <option value="{{ $tema->id }}">
                                                        {{ $tema->tema_adi }}
                                                    </option>
                                                @endforeach


                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Aktifmi ?</label>
                                            <br>
                                            <select name="active" class="form-control">
                                                <option {{ $temaBilgi->active == '1' ? "selected=''" : '' }} value="1">
                                                    Aktif
                                                </option>
                                                <option {{ $temaBilgi->active == '0' ? "selected=''" : '' }} value="0">
                                                    Pasif
                                                </option>
                                            </select>
                                        </div>
                                        <input type="text" value="{{ $temaBilgi->user_id }}" name="id" hidden>

                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Telegram Token</label>
                                            <span style="color: red;" class="badge rounded-pill ">*Zorunlu</span>
                                            <input id="" type="text" class="form-control"
                                                value="{{ $temaBilgi->telegram_token }}" name="telegram_token"
                                                autocomplete="off" required>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div style="margin-top: 1em;">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">EKLE</button>
                            </div>
                        </form>

                        <script>
                            $(".temaSec option[value='{{ $temaBilgi->id }}']").attr("selected", "selected");
                        </script>

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

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
