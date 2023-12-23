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
                        <h3 class="card-title"> Masalar</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div align="right">
                            <div id="ekle" class="btn btn-success">Ekle</div>
                        </div>
                        <br>
                        <div class="table-responsive">


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 15px; white-space: nowrap;">No</th>
                                        <th style=" white-space: nowrap;">Masa Adı</th>
                                        <th style="width: 150px;white-space: nowrap;">Düzenle</th>
                                        <th style="width: 150px;white-space: nowrap;">Sil</th>
                                    </tr>
                                </thead>
                                <tbody id="tablo" style="text-align: center;">
                                    @if (count($masa) > 0)
                                        @php
                                            $sayi = 1;
                                            // $sayi = count($data['user']);
                                        @endphp
                                        @foreach ($masa as $veri)
                                            <tr id="item-{{ $veri->id }}" data-id="{{ $veri->id }}">
                                                <td id="no-{{ $veri->id }}" class="no">{{ $sayi++ }}</td>
                                                <td id="edit-{{ $veri->id }}">{{ $veri->masa_adi }}</td>
                                                <td>
                                                    <a href="javascript:void(0)"><i id="{{ $veri->id }}"
                                                            style="color: orange;" class="fas fa-pen-square fa-2x"></i>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="javascript:void(0)"><i id="{{ $veri->id }}"
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
        $(document).ready(function() {
            id = $(this).attr('id');
            $('#ekle').click(function(e) {
                let sira = parseInt($('.no').last().text()) + 1;
                if (isNaN(sira)) {
                    sira = 1;
                }
                console.log(sira);
                Swal.fire({
                    title: 'Masa Ekle',
                    html: '<div>' +
                        ' <div class="mb-3">' +
                        '<label style="float: left;" for="masa_adi" class="form-label">Masa Adı</label>' +
                        '<input style="margin:0;margin-left:0;width: 99%;" type="text" class="swal2-input" id="masa_adi">' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonText: 'Ekle',
                    cancelButtonText: 'İptal',
                    preConfirm: () => {
                        const masaAdi = $('#masa_adi').val();

                        axios.post('/yonetim/masa', {
                                masa_adi: masaAdi,
                                id: {{ $id }},
                                sira: sira
                            })
                            .then(response => {
                                if (response.data.durum === 'basarili') {
                                    Swal.fire('Başarılı!', 'Masa Eklendi', 'success')
                                        .then(() => {
                                            $('#tablo').append('<tr id="item-' +
                                                response.data.id +
                                                '" data-id="' + response.data.id +
                                                '"><td id="no-' + response
                                                .data.id + '" class="no">' +
                                                sira +
                                                '</td><td id="edit-' + response
                                                .data.id + '">' + masaAdi.replace(
                                                    /\s+/g, '').replace(/(\b\w)/g,
                                                    function(match) {
                                                        return match.toUpperCase();
                                                    }) +
                                                '</td><td><a href="javascript:void(0)"><i id="' +
                                                response.data.id +
                                                '" style="color: orange;" class="fas fa-pen-square fa-2x"></i></a></td><td><a href="javascript:void(0)"><i id="' +
                                                response.data.id +
                                                '" style="color: red;" class="fas fa-trash-alt fa-2x"></i></a></td></tr>'
                                            );

                                        });
                                } else {
                                    Swal.fire('Hata!',
                                        'Masa eklenirken bir hata oluştu.', 'error');
                                }
                            })
                            .catch(error => {
                                Swal.fire('Hata!', 'Masa eklenirken bir hata oluştu.',
                                    'error');
                            });

                        return false;
                    }
                });
            });

            $(document).on('click', '.fa-pen-square', function() {

                var editId = $(this).attr('id');
                var editName = $('#edit-' + editId).text();

                Swal.fire({
                    title: 'Masa Adını Düzenle',
                    html: '<div>' +
                        ' <div class="mb-3">' +
                        '<label style="float: left;" for="masaEditAdi" class="form-label">Masa Adı</label>' +
                        '<input style="margin:0;margin-left:0;width: 99%;" type="text" value="' +
                        editName + '"  class="swal2-input" id="masaEditAdi">' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonText: 'Güncelle',
                    cancelButtonText: 'İptal',
                    preConfirm: () => {
                        const masaAdi = $('#masaEditAdi').val();

                        axios.post('/yonetim/masa/duzelt/{{ $id }}', {
                                editId: editId,
                                masaAdi: masaAdi,

                            })
                            .then(response => {

                                if (response.data === 'basarili') {
                                    Swal.fire('Başarılı!', 'Masa Adı Değiştirildi',
                                            'success')
                                        .then(() => {
                                            // Sayfayı yenile
                                            $('#edit-' + editId).text(masaAdi.replace(
                                                /\s+/g, '').replace(/(\b\w)/g,
                                                function(match) {
                                                    return match.toUpperCase();
                                                }));
                                        });
                                } else {
                                    Swal.fire('Hata!',
                                        'Masa düzenlenirken bir hata oluştu.',
                                        'error');
                                }
                            })
                            .catch(error => {
                                Swal.fire('Hata!',
                                    'Masa düzenlenirken bir hata oluştu.',
                                    'error');
                            });

                        return false;
                    }
                });

            });



            $(document).on('click', '.fa-trash-alt', function() {
                var deleteId = $(this).attr('id');

                Swal.fire({
                    title: 'Masa Silinsinmi?',
                    text: "Garsona Kayıtlı Masa varsa Otomatik Silinir",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: "İptal",
                    confirmButtonText: 'Evet Sil!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete('/yonetim/masa/{{ $id }}?id=' + deleteId)
                            .then(response => {
                                if (response.data === 'basarili') {
                                    Swal.fire('Başarılı!', 'Masa Başarıyla Silindi',
                                            'success')
                                        .then(() => {
                                            // Sayfayı yenile
                                            $("#item-" + deleteId).remove();
                                            $('.no').each(function(index) {
                                                // Sıralama işlemi
                                                $(this).text((index + 1));
                                            });
                                        });
                                } else {
                                    Swal.fire('Hata!',
                                        'Masa Silinirken bir hata oluştu.', 'error');
                                }
                            })
                            .catch(error => {
                                Swal.fire('Hata!', 'Masa silinirken bir hata oluştu.',
                                    'error');
                            });

                        return false;
                    }
                })
            });

            // Sağ tıklamayı engellemek için aşağıdaki kodu ekleyin
            $(document).on("contextmenu", function(e) {
                e.preventDefault();
            });


            // Sortable.js
            var sortable = new Sortable(document.getElementById('tablo'), {
                animation: 150,
                delay: 300,
                onEnd: function(event) {
                    var sira = event.newIndex + 1;
                    var id = event.item.getAttribute('data-id');
                    axios.put('/yonetim/masa/{{ $id }}', {
                            id: id,
                            sira: sortable.toArray()
                        })
                        .then(response => {
                            console.log(response.data);
                            if (response.data === 'basarili') {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'bottom-end',
                                    showConfirmButton: false,
                                    timer: 1200,
                                    timerProgressBar: true,
                                    background: 'lightgreen',


                                })

                                Toast.fire({
                                        icon: 'success',
                                        title: 'Sıralama Başarılı Değişti'
                                    })
                                    .then(() => {

                                    });
                            } else {
                                Swal.fire('Hata!',
                                    'Kategori eklenirken bir hata oluştu.', 'error');
                            }

                        })
                        .catch(error => {
                            Swal.fire('Hata!', 'Kategori eklenirken bir hata oluştu.',
                                'error');
                        });

                    var siraSayisi = 1;
                    for (var i = 0; i < sortable.toArray().length; i++) {
                        $('#no-' + sortable.toArray()[i]).text(siraSayisi);
                        siraSayisi++;
                    }
                }
            });


        });
    </script>
@endsection
