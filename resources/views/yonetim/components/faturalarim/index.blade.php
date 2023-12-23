@extends('yonetim.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <button class="btn btn-primary" onclick="window.history.back()" type="submit">Geri Git</button>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Abonelik Ve Faturalarım</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('faturalarim.abonelikler') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i
                                                class="fa-duotone fa-clipboard-check"></i></span>
                                        <div class="info-box-content">

                                            <span class="info-box-text">Aboneliklerim</span>
                                            <span class="info-box-number">{{ $abonelikler }}</span>

                                        </div>

                                    </div>
                                </a>

                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('faturalarim.islemler') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i
                                                class="fa-duotone fa-file-lines"></i></span>
                                        <div class="info-box-content">

                                            <span class="info-box-text">Tüm İşlemlerim</span>
                                            <span class="info-box-number">{{ $islemSayisi }}</span>

                                        </div>

                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('css')
@endsection
@section('js')
@endsection
