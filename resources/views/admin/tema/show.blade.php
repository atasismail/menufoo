@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Detaylı Bilgi</h3>
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





                            <div class="col-md-12">

                                <div class="card card-widget widget-user shadow">

                                    <div style="height: 160px;" class="widget-user-header bg-warning">
                                        <h3 class="widget-user-username">{{ $user->displayName ?? '' }}</h3>
                                        <h5 class="widget-user-desc">{{ $user->email ?? '' }}</h5>
                                        <h5 class="widget-user-desc">{{ $user->tel_no ?? '' }}</h5>
                                        <br><br>
                                    </div>
                                    <div style="    top: 110px;" class="widget-user-image">
                                        <img class="img-circle elevation-2" src="/images/users/{{ $user->user_file ?? '' }}"
                                            alt="User Avatar">
                                    </div>
                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-sm-3 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">Eklediği Ürün Sayısı</h5>
                                                    <span class="description-text">0</span>
                                                </div>

                                            </div>
                                            <div class="col-sm-3 border-right">
                                                <div class="description-block">
                                                    <h5 class="description-header">Sattığı Ürün Sayısı</h5>
                                                    <span class="description-text">0</span>
                                                </div>

                                            </div>


                                            <div class="col-sm-3">
                                                <div class="description-block">
                                                    <h5 class="description-header">Banlı mı?</h5>
                                                    <span
                                                        class="description-text">{{ $user->active ?? '' == 1 ? 'Hayır' : 'Evet' }}</span>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <center> <b>Eklediği Ürünler</b></center>
                                <br><br>
                                <center>Henüz Ürün Ekleme Yapmamış</center>

                            </div>








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
