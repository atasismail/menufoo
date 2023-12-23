@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Menufoo Yönetim Paneli</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3>0</h3>

                                        <p>Aktif Abone Sayısı</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa-regular fa-person"></i>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h3>0</h3>

                                        <p>Abone İptal Sayısı</p>
                                    </div>
                                    <div class="icon">

                                        <i class="fa-solid fa-person-circle-xmark"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>0</h3>

                                        <p>Toplam Kazanç</p>
                                    </div>
                                    <div class="icon">

                                        <i class="fa-solid fa-money-bills"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h3>0</h3>

                                        <p>Aylık Kazanç</p>
                                    </div>
                                    <div class="icon">

                                        <i class="fa-solid fa-money-bill-trend-up"></i>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="row">


                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('admin') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-dark"><i class="far fa-shield"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Yönetici Sayısı</span>
                                            <span class="info-box-number">{{ $data['admin'] }}</span>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="far fa-bank"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Cari İşelemler</span>

                                        </div>

                                    </div>
                                </a>

                            </div> --}}
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue"><i class="far fa-phone-plus"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Firma Rehber Sayısı</span>
                                        <span class="info-box-number">{{ $data['tel'] }}</span>
                                    </div>

                                </div>

                            </div>

                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('user.index') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-orange"><i class="far fa-users"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Firma Yönetim</span>
                                            <span class="info-box-number">{{ $data['user'] }}</span>
                                        </div>

                                    </div>
                                </a>
                            </div>
                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('user.ban') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i class="far fa-ban"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Banlı Firmalar</span>
                                            <span class="info-box-number">{{ $data['ban'] }}</span>
                                        </div>

                                    </div>
                                </a>

                            </div> --}}
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('tema.index') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-lime">
                                            <i class="fa-solid fa-sparkles"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"> Temalar</span>
                                            <span class="info-box-number">{{ $data['tema_sayisi'] }}</span>
                                        </div>

                                    </div>
                                </a>
                            </div>


                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning">
                                            <i class="fa-solid fa-bell"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Bildirim Gönder</span>

                                        </div>

                                    </div>
                                </a>
                            </div> --}}

                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('data.index') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-maroon"><i class="fa-solid fa-database"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Veri Tabanı</span>

                                        </div>

                                    </div>
                                </a>
                            </div>

                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-indigo"><i class="fa-solid fa-message-pen"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Hukuksal Sayfalar</span>
                                            <span class="info-box-number">0</span>
                                        </div>

                                    </div>
                                </a>
                            </div> --}}



                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('log') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i
                                                class="fa-solid fa-triangle-exclamation"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Loglar</span>
                                            <span class="info-box-number">{{ $data['log'] }}</span>
                                        </div>

                                    </div>
                                </a>

                            </div>
                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-fuchsia"><i
                                                class="fa-solid fa-trash-xmark"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Çöp Kutusu</span>
                                            <span class="info-box-number">0</span>
                                        </div>

                                    </div>
                                </a>
                            </div> --}}
                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fa-solid fa-gears"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Ayarlar</span>

                                        </div>

                                    </div>
                                </a>
                            </div> --}}

                            {{-- <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fa-solid fa-chart-pie"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">İstatistikler</span>

                                    </div>

                                </div>

                            </div> --}}



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
@endsection
