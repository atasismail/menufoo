@extends('yonetim.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <a href="{{ route('firma.index') }}"><button class="btn btn-primary" type="submit">Geri Git</button></a>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">FİRMA DÜZENLE</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        @include('yonetim.components.firma.editForm')

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
