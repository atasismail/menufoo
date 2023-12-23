@extends('yonetim.layout')
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
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                @if ($data['temam_sayisi'] > 0)
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>Aktif</h3>

                                            <p>Abonelik Durumu</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-regular fa-person"></i>

                                        </div>

                                    </div>
                                @else
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3>Pasif</h3>

                                            <p>Abonelik Durumu</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fa-regular fa-person"></i>

                                        </div>

                                    </div>
                                @endif



                            </div>
                            <div class="col-lg-3 col-6">
                                <a style="color: black; cursor: pointer;" href="{{ route('temalar.index') }}">
                                    <!-- small box -->
                                    <div class="small-box bg-indigo">
                                        <div class="inner">
                                            <h3>{{ $data['tema_sayisi'] }}</h3>

                                            <p>Tema Mağazası</p>
                                        </div>
                                        <div class="icon">

                                            <i class="fa-solid fa-store"></i>
                                        </div>

                                    </div>
                                </a>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('firma.index') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-blue"><i class="fa-duotone fa-buildings"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Firma</span>
                                            <span class="info-box-number">Ekle Düzenle</span>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('temalarim.index') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-lime">
                                            <i class="fa-duotone fa-sparkles"></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"> Temalarım</span>
                                            <span class="info-box-number">{{ $data['temam_sayisi'] }}</span>

                                        </div>

                                    </div>
                                </a>
                            </div>


                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('faturalarim.index') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i
                                                class="fa-duotone fa-file-invoice"></i></span>
                                        <div class="info-box-content">

                                            <span class="info-box-text">Abone Ve</span>
                                            <span class="info-box-text">Faturalarım</span>

                                        </div>

                                    </div>
                                </a>

                            </div> --}}

                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('admin') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-dark"><i class="far fa-users"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Çalışanlar</span>
                                            <span class="info-box-number">0</span>
                                        </div>

                                    </div>
                                </a>
                            </div> --}}




                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('user.index') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-orange"><i class="far fa-users"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">İstatistiklerim</span>
                                            <span class="info-box-number">0</span>
                                        </div>

                                    </div>
                                </a>
                            </div> --}}
                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('user.ban') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i class="far fa-ban"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Banlı Firmalar</span>
                                            <span class="info-box-number">0</span>
                                        </div>

                                    </div>
                                </a>

                            </div> --}}



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

                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-maroon"><i class="fa-solid fa-database"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Veri Tabanı</span>

                                        </div>

                                    </div>
                                </a>
                            </div> --}}





                            {{-- <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('log') }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i
                                                class="fa-solid fa-triangle-exclamation"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Loglar</span>
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
