@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">PLAN DÜZENLE</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="container" style="margin-top: 1em;">
                        <!-- Sign up form -->
                        <form action="{{ route('plan.update', $plan->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <!-- Sign up card -->
                            <div class="card person-card">
                                <div class="card-body">


                                    <div class="row">


                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Plan Adı</label>
                                            <input id="" type="text" class="form-control"
                                                value="{{ $plan->plan_adi }}" name="plan_adi">
                                        </div>


                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Deneme Gün Sayısı</label>
                                            <input id="" type="number" class="form-control"
                                                value="{{ $plan->deneme_gun_sayisi }}" name="deneme_gun_sayisi">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="col-form-label">Sıra Numarası</label>
                                            <input id="" type="number" class="form-control"
                                                value="{{ $plan->sira_numarasi }}" name="sira_numarasi" required>
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
                    <div style="margin-top: 1em;">
                        <button type="submit" class="btn btn-dark btn-lg btn-block">DÜZENLE</button>
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
