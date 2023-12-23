@extends('yonetim.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <a href="{{ route('temalarim.tema', $id) }}"><button class="btn btn-primary" type="submit">Geri
                        Git</button></a>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"> Ürünler</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <br>
                        <div class="table-responsive">


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 15px; white-space: nowrap;">No</th>
                                        <th style="width: 15px; white-space: nowrap;">sıra No</th>
                                        <th style="width: 150px; white-space: nowrap;">Ürün Resmi</th>
                                        <th style="white-space: nowrap;">Ürün Adı</th>
                                        <th style="white-space: nowrap;">Ürün Fiyatı</th>
                                        <th style="max-width: 90px;white-space: nowrap;">Fiyatı Güncelle</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    @if (count($urun) > 0)
                                        @php
                                            $sayi = 1;
                                            // $sayi = count($data['user']);
                                        @endphp
                                        @foreach ($urun as $veri)
                                            <tr id="item-{{ $veri->id }}">


                                                <td>{{ $sayi++ }}</td>
                                                <td>{{ $veri->sira }}</td>
                                                <td><img style=" height: 100px; object-fit: contain; width: 100px;"
                                                        src="{{ asset('cdn/images/urunler/' . $veri->urun_resmi) }}"
                                                        class="img-fluid" alt="..."></td>
                                                <td>{{ $veri->urun_adi }}</td>

                                                <td id="fiyat-{{ $veri->id }}">{{ $veri->fiyat }}₺
                                                </td>
                                                <td>
                                                    <i data-id="{{ $veri->id }}" data-fiyat="{{ $veri->fiyat }}"
                                                        style="color: orange;" class="duzenle fas fa-pen-square fa-2x"></i>

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
    <script>
        $('.duzenle').click(function(e) {
            var editId = $(this).data('id');
            var editFiyat = $(this).data("fiyat");



            Swal.fire({
                title: 'Ürün Fiyatını Düzenle',
                html: '<div>' +
                    ' <div class="mb-3">' +
                    '<label style="float: left;" for="urunFiyat" class="form-label">Ürün Fiyatı <span style="color: darkblue;margin-left: 5px;" class="fiyatYaz">' +
                    editFiyat + ' ₺</span></label>' +
                    '<input style="margin:0;margin-left:0;width: 99%;" type="number" min="1" step="any" value="' +
                    editFiyat + '"  class="swal2-input" id="urunFiyat">' +
                    '</div>',
                showCancelButton: true,
                confirmButtonText: 'Güncelle',
                cancelButtonText: 'İptal',
                preConfirm: () => {
                    const fiyat = $('#urunFiyat').val();
                    // const kategori = $('#kategori').val();

                    axios.post('/yonetim/fiyat/duzelt/{{ $id }}', {
                            editId: editId,
                            editFiyat: fiyat,

                        })
                        .then(response => {
                            console.log(response.data);

                            if (response.data === 'basarili') {
                                // Kategori eklendikten sonra başarı mesajı göster
                                Swal.fire('Başarılı!', 'Fiyat Başarıyla Değiştirildi',
                                        'success')
                                    .then(() => {
                                        $(this).data('fiyat', fiyat);
                                        $('#fiyat-' + editId).text(fiyat + "₺");
                                        // Sayfayı yenile

                                    });
                            } else {
                                Swal.fire('Hata!',
                                    'Kategori düzenlenirken bir hata oluştu.',
                                    'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Hata!',
                                'Kategori düzenlenirken bir hata oluştu.',
                                'error');
                        });

                    return false;
                }
            });

        });

        var nf = new Intl.NumberFormat();

        $(document).on('keyup', '#urunFiyat', function() {

            if ($(this).val() <= 0) {
                $('.fiyatYaz').text("Ürün Fiyatını Giriniz");
            } else {
                $('.fiyatYaz').text(" " + nf.format($(this).val()) + " ₺");
            }
        });
    </script>
@endsection
