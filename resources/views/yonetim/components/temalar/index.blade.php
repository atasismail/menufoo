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
                        <h3 class="card-title"> TEMA MAĞAZASI</h3>

                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            @foreach ($data as $tema)
                                <div class="col-md-3">
                                    <div class="card mb-4 shadow-md ">
                                        <img style="max-width: 300px;margin: 0 auto;" class="card-img-top rounded"
                                            src="{{ asset('cdn/tema/' . $tema->kapak_resmi) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title mb-2">{{ $tema->tema_adi }}</h5>
                                            <p class="card-text">
                                                {{ strip_tags(mb_substr($tema->tema_aciklama, 0, 50) . '...') }}
                                            </p>

                                            <div>
                                                <a style="width: 100%; background-color: #a81aa9"
                                                    href="{{ route('temalar.show', $tema->id) }}"
                                                    class="btn btn-dark mb-2">Temaya Git</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
