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

                        <div class="container" style="margin-top: 1em;">
                            <!-- Sign up form -->
                            <form action="{{ route('tema.store') }}" method="post" enctype="multipart/form-data">

                                @csrf
                                <!-- Sign up card -->
                                <div class="card person-card">
                                    <div class="card-body">
                                        <br>

                                        <center>
                                            <i style="font-size: 100px; color: #1da311;"
                                                class="fa-solid fa-sparkles fa-2xl"></i>
                                        </center>

                                        <br><br>

                                        <div class="row">


                                            <div style="margin-top: -25px;" class="form-group col-md-6">
                                                <br>
                                                <label class="col-form-label">Kapak Resmi Seç</label>
                                                <input name="kapak_resmi" type="file" accept="image/*"
                                                    class="form-control">
                                            </div>




                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Tema Adı</label>
                                                <input id="" type="text" class="form-control" value=""
                                                    name="tema_adi">
                                            </div>


                                            <div class="form-group col-md-12">
                                                <label class="col-form-label">Tema Açıklaması</label>

                                                <Textarea class="form-control" value="" name="tema_aciklama">

                                                </Textarea>

                                            </div>
                                            <script>
                                                CKEDITOR.replace('tema_aciklama');
                                            </script>


                                            <div style="margin-top: -25px;" class="form-group col-md-6">
                                                <br>
                                                <label class="col-form-label">Tema Resimleri Seç</label>
                                                <input name="tema_resimleri[]" type="file" accept="image/*" multiple
                                                    class="form-control">
                                            </div>

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


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.container-fluid -->
@endsection
