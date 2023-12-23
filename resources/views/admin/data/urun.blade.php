@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">

            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"> VeriTabanı</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div align="right">
                            <a href="{{ route('data.create') }}"> <button class="btn btn-success"
                                    type="submit">Ekle</button></a>

                        </div>
                        <br>
                        <div class="table-responsive">


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 15px; white-space: nowrap;">No</th>
                                        <th style="width: 15px; white-space: nowrap;">sıra No</th>
                                        <th style="width: 150px; white-space: nowrap;">Ürün Resmi</th>
                                        <th style="white-space: nowrap;">Ürün Adı</th>
                                        <th style="white-space: nowrap;">Ürün İçerik</th>
                                        <th style="white-space: nowrap;">Ürün Fiyatı</th>
                                        <th style="max-width: 50px;white-space: nowrap;">Düzenle</th>
                                        <th style="max-width: 50px;white-space: nowrap;">Sil</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @if (count($data) > 0)
                                        @php
                                            $sayi = 1;
                                            // $sayi = count($data['user']);
                                        @endphp
                                        @foreach ($data as $veri)
                                            <tr id="item-{{ $veri->id }}">


                                                <td>{{ $sayi++ }}</td>
                                                <td>{{ $veri->sira }}</td>
                                                <td><img style=" height: 100px; object-fit: contain; width: 100px;"
                                                        src="{{ asset('cdn/images/urunler/' . $veri->urun_resmi) }}"
                                                        class="img-fluid" alt="..."></td>
                                                <td>{{ $veri->urun_adi }}</td>
                                                <td>{{ $veri->urun_icerik }}</td>
                                                <td>{{ number_format(floatval(str_replace(',', '', $veri->fiyat)), 2) }} ₺
                                                </td>
                                                <td>
                                                    <a href="{{ route('data.edit', $veri->id) }}"><i style="color: orange;"
                                                            class="fas fa-pen-square fa-2x"></i>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0)"><i id="@php echo $veri->id @endphp "
                                                            style="color: red;" class="fas fa-trash-alt fa-2x"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .t_cusom th {
            background: #282828;
            color: #fff;
        }

        .tabloSolid {
            border: solid 1px rgb(156, 154, 154) !important;
            text-align: center;
            margin: 0px;
        }
    </style>
    <script type="text/javascript">
        $(".fa-trash-alt").click(
            function() {
                destroy_id = $(this).attr('id');

                alertify.confirm('Silme İşlemini Onaylayın', 'Silinirse Geri Alınamaz', function() {
                    axios.delete("/yonetim/urun/" + destroy_id)
                        .then(function(response) {
                            console.log(response);
                            if (response) {

                                if (response) {
                                    $("#item-" + destroy_id).remove();
                                    alertify.success('Silme işlem Başarılı');

                                } else {
                                    alertify.error('silme işlem Başarısız');
                                }
                            } else {

                                alertify.error('işlem Başarısız');
                            }
                        }).catch(function(error) {
                            console.log(error);
                        });
                }, function() {
                    alertify.error('Vazgeçtiniz');
                }).set('labels', {
                    ok: 'Sil',
                    cancel: 'Vazgeç'
                });

            });
    </script>
@endsection
