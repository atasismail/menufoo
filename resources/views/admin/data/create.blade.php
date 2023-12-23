@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">

            <div style="margin:0 auto;" class="col-md-8">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Ürün EKLE</h3>


                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        @include('admin.data.urunEkle')

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
