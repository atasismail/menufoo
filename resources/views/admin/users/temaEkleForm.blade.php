@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">TEMA EKLE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <!-- Sign up form -->
                        <form action="{{ route('user.temaPostEkle') }}" method="post" enctype="multipart/form-data">

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

                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Kullanıcı Seç</label>
                                            <br>
                                            <select name="tema_id" class="form-control" required>
                                                <option value="">Tema Seç</option>
                                                @foreach ($temalar as $tema)
                                                    <option value="{{ $tema->id }}">
                                                        {{ $tema->tema_adi }}
                                                    </option>
                                                @endforeach


                                            </select>
                                        </div>
                                        <input type="text" value="{{ $id }}" name="id" hidden>
                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Telegram Token</label>
                                            <span style="color: red;" class="badge rounded-pill ">*Zorunlu</span>
                                            <input id="" type="text" class="form-control" value=""
                                                name="telegram_token" autocomplete="off" required>
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
