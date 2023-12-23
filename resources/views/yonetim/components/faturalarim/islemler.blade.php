@php
    use Carbon\Carbon;
@endphp
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
                        <h3 class="card-title">Tüm İşlemler</h3>

                        <!-- /.card-tools -->
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            @isset($islemler)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 15px;">No</th>
                                            <th style="width: 150px;">İşlem Fiyatı</th>
                                            <th>Çekim Tarihi</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $sayi = 1;
                                            // $sayi = count($data['user']);
                                        @endphp

                                        @foreach ($islemler->getPayments() as $veri)
                                            @if ($veri->paymentRefundStatus == 'NOT_REFUNDED')
                                                <tr style="text-align: center;">
                                                    <td>{{ $sayi++ }}</td>
                                                    <td>{{ $veri->price }} ₺</td>
                                                    <td>{{ Carbon::parse($veri->createdDate)->format('Y-m-d H:i:s') }}
                                                    </td>

                                                </tr>
                                            @endif
                                        @endforeach

                                    </tbody>
                                </table>
                            @endisset

                        </div>



                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
