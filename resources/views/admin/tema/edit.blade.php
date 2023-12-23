@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Tema DÜZENLE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="container" style="margin-top: 1em;">
                        <!-- Sign up form -->
                        <form action="{{ route('tema.update', $tema->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <!-- Sign up card -->
                            <div class="card person-card">
                                <div class="card-body">


                                    <div class="row">
                                        <div style="margin-top: -25px;" class="form-group col-md-3">
                                            <br>
                                            <label class="col-form-label">Yüklü Kapak Resim </label>
                                            <br>
                                            <img width="100" src="/cdn/tema/{{ $tema->kapak_resmi ?? 'resim.png' }} "
                                                alt="">
                                        </div>


                                        <div style="margin-top: -25px;" class="form-group col-md-3">
                                            <br>
                                            <label class="col-form-label">Kapak Resmş Seç</label>
                                            <input name="kapak_resmi" type="file" accept="image/*" class="form-control">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">tema Adı</label>
                                            <input id="" type="text" class="form-control"
                                                value="{{ $tema->tema_adi }}" name="tema_adi">
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="col-form-label">Tema Açıklaması</label>

                                            <Textarea class="form-control" value="" name="tema_aciklama">
                                                {!! $tema->tema_aciklama !!}
                                            </Textarea>

                                        </div>
                                        <script>
                                            CKEDITOR.replace('tema_aciklama');
                                        </script>




                                        <div style="margin-top: -25px;" class="form-group col-md-6">
                                            <br>
                                            <label class="col-form-label">Yüklü Tema Resimleri </label>
                                            <br>
                                            @php
                                                $parcala = explode(',', $tema->tema_resimleri);
                                            @endphp
                                            @foreach ($parcala as $resimler)
                                                <img width="100" src="/cdn/tema/{{ $resimler ?? 'resim.png' }} "
                                                    alt="">
                                            @endforeach

                                        </div>


                                        <div style="margin-top: -25px;" class="form-group col-md-6">
                                            <br>
                                            <label class="col-form-label">Tema Resimleri Seç</label>
                                            <input name="tema_resimleri[]" type="file" accept="image/*" multiple
                                                class="form-control">
                                        </div>



                                        <input type="hidden" name="eski_isim" value="{{ $tema->tema_adi }}">
                                        <input type="hidden" name="old_file" value="{{ $tema->kapak_resmi }}">

                                        <input type="hidden" name="old_file2" value="{{ $tema->tema_resimleri }}">
                                    </div>
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

                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.container-fluid -->
@endsection
