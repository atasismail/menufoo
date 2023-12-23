@extends('yonetim.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <a href="{{ route('temalarim.index') }}">
                    <button class="btn btn-primary" type="submit">Geri Git</button>
                </a>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"> TEMALARIM</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('temalarim.firmayaBagla', $id) }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-orange"><i class="fa-duotone fa-link"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Temayı</span>
                                            <span class="info-box-number">Firmaya Bağla</span>

                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('kategori.show', $id) }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-indigo"><i class="fa-duotone fa-list"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Kategori</span>
                                            <span class="info-box-number">Ekle Düzenle</span>

                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('urun.show', $id) }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-maroon"><i
                                                class="fa-duotone fa-plate-utensils"></i></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Ürün</span>
                                            <span class="info-box-number">Ekle Düzenle</span>
                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('fiyat.show', $id) }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i
                                                class="fa-duotone fa-money-bill-transfer"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Fiyat Güncelle</span>

                                        </div>

                                    </div>
                                </a>

                            </div>


                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('masa.show', $id) }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-cyan">
                                            <i class="fa-duotone fa-grid-2 "></i>
                                        </span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Masa</span>
                                            <span class="info-box-number">Ekle Düzenle</span>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('garson.show', $id) }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning"><i class="fa-duotone fa-bells"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Garson</span>
                                            <span class="info-box-number">Bildirim Ayarı</span>

                                        </div>

                                    </div>
                                </a>
                            </div>


                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('qrcode.show', $id) }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-fuchsia"><i class="fa-duotone fa-qrcode"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Qr Kod</span>
                                            <span class="info-box-number">Ekle Düzenle</span>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <div class="col-xl-3 col-md-4 col-sm-6 col-12">
                                <a style="color: black;" href="{{ route('secenek.index', $id) }}">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-blue"><i class="fa-duotone fa-toggle-on"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Tema Seçenek</span>
                                            <span class="info-box-number">Ekle Kaldır</span>

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
