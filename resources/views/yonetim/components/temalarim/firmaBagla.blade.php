@extends('yonetim.layout')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <button class="btn btn-primary" onclick="window.history.back()" type="submit">Geri Git</button>
            </div>
            <center>
                <div class="col-md-4">
                    <div class="card card-dark">
                        <div class="card-header ">
                            <h3 class="card-title"> Temayı Firmaya Bağla</h3>

                        </div>

                        @if ($data->active == 1)
                            <form action="{{ route('temalarim.firmayaBaglat', $id) }}" method="post">
                                @csrf
                                <div class="card-body">

                                    <h1>{{ $data->plan_adi }} Tema</h1>

                                    <br>

                                    <div class="form-group col-md-12">
                                        <label style="float: left;" class="col-form-label">Oluşturduğunuz Firmayı
                                            Seçiniz</label>
                                        <br>
                                        <select id="firmaSecenek" name="firma" class="form-control" required>
                                            <option value="">Firma Seçiniz</option>
                                            @foreach ($firmalar as $veri)
                                                <option value="{{ $veri->id }}">{{ $veri->firma_adi }}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                </div>
                                <div class="card-footer">
                                    <div>
                                        <button style="width: 80%;" type="submit"
                                            class="btn bg-dark btn-lg btn-block">EKLE</button>
                                    </div>
                                    <br>
                                </div>

                            </form>
                        @else
                            <div class="alert alert-danger col-12" role="alert">
                                Temanız Abonelik İptal Edildiği İçin Malesef Firmaya Bağlayamazsınız
                            </div>
                        @endif
                    </div>
                </div>

            </center>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            if ({{ $data->firma_id }} != "" && {{ $data->firma_id }} != null) {
                $("#firmaSecenek").val({{ $data->firma_id }});

            }

        });
    </script>
@endsection
