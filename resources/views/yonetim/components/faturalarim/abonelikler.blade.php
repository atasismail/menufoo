@extends('yonetim.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <button class="btn btn-primary" onclick="history.back()" type="submit">Geri Git</button>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Aboneliklerim</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            @isset($abonelikler)
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th style="width: 15px;">No</th>
                                            <th style="width: 150px;">Abonelik Adı</th>
                                            <th>Deneme Süresi</th>
                                            <th>Abonelik Tarihi</th>
                                            <th>Aktif / Pasif</th>
                                            <th>Abonelik İptal Et</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $sayi = 1;
                                            // $sayi = count($data['user']);
                                        @endphp

                                        @foreach ($abonelikler as $veri)
                                            @if ($veri->periyot != 'SINIRSIZ')
                                                <tr style="text-align: center;" id="item-{{ $veri->id }}">
                                                    <td>{{ $sayi++ }}</td>
                                                    <td>{{ $veri->plan_adi }} Paket</td>
                                                    <td>{{ $veri->deneme_gun_sayisi }} Gün</td>
                                                    <td>{{ $veri->olusturma_tarihi }}</td>
                                                    <td>Aktif</td>


                                                    <td class="" style="text-align: center;"><a
                                                            href="{{ route('faturalarim.iptalEtSayfasi', $veri->referans_kod) }}"><i
                                                                style="color: red;" class="fas fa-xmark fa-2x"></i></a></td>
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
