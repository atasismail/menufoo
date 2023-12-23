@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">PLAN EKLE</h3>


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
                            <!-- Sign up form -->
                            <form action="{{ route('plan.store') }}" method="post" enctype="multipart/form-data">

                                @csrf
                                <!-- Sign up card -->
                                <div class="card person-card">
                                    <div class="card-body">
                                        <br>

                                        <center>
                                            <i style="font-size: 100px; color: #1da311;"
                                                class="fa-solid fa-timer fa-2xl"></i>
                                        </center>

                                        <br><br>

                                        <div class="row">



                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Plan Adı</label>
                                                <input id="" type="text" class="form-control" value=""
                                                    name="plan_adi" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Fiyat</label>
                                                <input id="" type="number" class="form-control" value=""
                                                    name="fiyat" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Fiyat Cinsi</label>
                                                <br>
                                                <select name="fiyat_cinsi" class="form-control">
                                                    <option value="TRY">TRY</option>
                                                    <option value="USD">USD</option>
                                                    <option value="EUR">EUR</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Peryot</label>
                                                <br>
                                                <select name="periyot" class="form-control">
                                                    <option value="DAILY">Günlük</option>
                                                    <option value="WEEKLY">Haftalık</option>
                                                    <option value="MONTHLY">Aylık</option>
                                                    <option value="YEARLY">Yıllık</option>
                                                    <option value="SINIRSIZ">Sınırsız</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Peryot Süre Sayısı</label>
                                                <input id="" type="number" class="form-control" value=""
                                                    name="periyot_sure_sayisi" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Deneme Gün Sayısı</label>
                                                <input id="" type="number" class="form-control" value=""
                                                    name="deneme_gun_sayisi" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="col-form-label">Sıra Numarası</label>
                                                <input id="" type="number" class="form-control" value=""
                                                    name="sira_numarasi" required>
                                            </div>

                                            <input type="hidden" name="urun_id" value="{{ $id }}">


                                        </div>

                                    </div>
                                </div>
                        </div>
                        <div style="margin-top: 1em;">
                            <button type="submit" class="btn btn-dark btn-lg btn-block">EKLE</button>
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


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.container-fluid -->
@endsection
@section('css')
@endsection
@section('js')
@endsection
