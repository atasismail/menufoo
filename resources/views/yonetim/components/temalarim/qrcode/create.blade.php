@extends('yonetim.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <a href="{{ route('qrcode.show', $id) }}"><button class="btn btn-primary" type="submit">Geri Git</button></a>
            </div>
            <div style="margin: 0 auto;" class="col-md-8">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">QrKod EKLE</h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        @include('yonetim.components.temalarim.qrcode.qrcodenEkle')

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
