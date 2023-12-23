@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Bildirim Gönder</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('bildirimgonder') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group col-md-12">
                                <label class="col-form-label">Bildirim Başlığı</label>
                                <input id="" type="text" class="form-control" value="Yeni İlanlar Eklendi 👋"
                                    name="title">
                            </div>

                            <div class="form-group col-md-12">
                                <label class="col-form-label">Bildirim İçeriği</label>
                                <br>
                                <textarea style="width:100%" name="body" id="" cols="30" rows="10"></textarea>
                            </div>


                            <div style="margin-top: 1em;">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">Bildirim Gönder</button>
                            </div>

                        </form>

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
