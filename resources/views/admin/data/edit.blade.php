@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">

            <div style="margin:0 auto;" class="col-md-8">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">ÜRÜN DÜZENLE</h3>



                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        @include('admin.data.urunDuzenle')

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
