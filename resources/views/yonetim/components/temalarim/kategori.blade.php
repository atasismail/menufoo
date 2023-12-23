@extends('yonetim.layout')
@section('content')
    <style>
        .sil {
            position: absolute;
            right: 30px;
            color: red;

        }

        .duzenle {
            position: absolute;
            right: 60px;
            color: orange;
        }

        body {
            zoom: 1.1;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row p-3">

                <div class="col-6" style="text-align: start;">
                    <button class="btn btn-primary" onclick="window.history.back()" type="submit">Geri Git</button>
                </div>
                <div class="col-6" style="text-align: end;">
                    <button id="ekle" class="btn btn-success" type="submit">Ekle</button>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-6 m-auto">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"> Kategori Düzenle</h3>
                    </div>

                    <div id="ust_kategori" class="m-2 mb-2">
                        @foreach ($veri as $kategoriler)
                            <div class="list-group-item " data-ust_id="{{ $kategoriler->id }}">
                                {{ $kategoriler->kategori_adi }}
                                <i class="fa-solid fa-trash sil" data-delete_id="{{ $kategoriler->id }}"></i>
                                <i class="fa-solid fa-edit duzenle" data-edit_id="{{ $kategoriler->id }}"
                                    data-edit_name="{{ $kategoriler->kategori_adi }}"></i>
                                <div style="cursor: pointer;" id="alt_kategori" class="list-group nested-sortable"
                                    data-ust_id="{{ $kategoriler->id }}">
                                    @foreach ($kategoriler->kategoriler as $kategori)
                                        <div class="list-group-item" data-ust_id="{{ $kategori->id }}"
                                            data-ust_kategori_id="{{ $kategori->kategori_id }}">
                                            {{ $kategori->kategori_adi }}
                                            <i class="fa-solid fa-trash sil" data-delete_id="{{ $kategori->id }}"></i>
                                            <i class="fa-solid fa-edit duzenle" data-edit_id="{{ $kategori->id }}"
                                                data-edit_name="{{ $kategori->kategori_adi }}"></i>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>

                    <script type="text/javascript">
                        function updateOrder(e) {
                            var movedItem = e.item;
                            var newUstId = $(movedItem).closest(".nested-sortable").data("ust_id");
                            var categoryId = $(movedItem).data('ust_id');

                            // Check if the item's parent has changed
                            if (newUstId !== categoryId) {
                                // Update the 'data-ust_kategori_id' attribute with the new parent's 'data-ust_id' value
                                $(movedItem).attr('data-ust_kategori_id', newUstId);
                            }

                            var categories = [];

                            $(".list-group-item").each(function() {
                                var categoryId = $(this).data('ust_id');
                                var ustKategoriId = $(this).data('ust_kategori_id');
                                categories.push({
                                    id: categoryId,
                                    ustKategoriId: ustKategoriId == null ? null : ustKategoriId,
                                });
                            });

                            axios.put('/yonetim/kategori/{{ $id }}', {
                                    kategoriler: categories,
                                })
                                .then(response => {
                                    if (response.data === 'basarili') {
                                        // Kategori eklendikten sonra başarı mesajı göster
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
                                                // Sayfayı yenile
                                                window.location.reload(true);
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
                        }

                        $(document).ready(function() {

                            const categoryData = {!! $veri !!};

                            var nestedSortables = $(".nested-sortable");
                            for (var i = 0; i < nestedSortables.length; i++) {
                                new Sortable(nestedSortables[i], {
                                    group: 'nested',
                                    animation: 150,
                                    delay: 300,
                                    onEnd: function(e) {
                                        updateOrder(e);
                                    }
                                });
                            }
                            // Sağ tıklamayı engellemek için aşağıdaki kodu ekleyin
                            $(document).on("contextmenu", function(e) {
                                e.preventDefault();
                            });




                            $('#ekle').click(function(e) {
                                let categoryOptions = '<option value="">Üst Kategori</option>';

                                // Iterate through the categoryData and generate options
                                categoryData.forEach(element => {
                                    categoryOptions +=
                                        `<option value="${element.id}">${element.kategori_adi}</option>`;
                                });

                                Swal.fire({
                                    title: 'Kategori Ekle',
                                    html: '<div>' +
                                        ' <div class="mb-3">' +
                                        '<label style="float: left;" for="kategoriAdi" class="form-label">Kategori Adı</label>' +
                                        '<input style="margin:0;margin-left:0;width: 99%;" type="text" class="swal2-input" id="kategoriAdi">' +
                                        '</div>' +
                                        '<div class="mb-3">' +
                                        '<label style="float: left;" for="kategori" class="form-label">Kategori Seç</label>' +
                                        '<select class="form-control form-control-lg kategori_ekle" id="kategori">' +
                                        categoryOptions +
                                        '</select>' +
                                        '</div>',
                                    showCancelButton: true,
                                    confirmButtonText: 'Ekle',
                                    cancelButtonText: 'İptal',
                                    preConfirm: () => {
                                        const kategoriAdi = $('#kategoriAdi').val();
                                        const kategori = $('#kategori').val();

                                        axios.post('/yonetim/kategori', {
                                                kategoriAdi: kategoriAdi,
                                                kategori: kategori,
                                                id: {{ $id }},
                                            })
                                            .then(response => {
                                                console.log(response.data);

                                                if (response.data === 'basarili') {
                                                    // Kategori eklendikten sonra başarı mesajı göster
                                                    Swal.fire('Başarılı!', 'Kategori Eklendi', 'success')
                                                        .then(() => {
                                                            // Sayfayı yenile
                                                            window.location.reload(true);
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

                                        return false;
                                    }
                                });
                            });

                            $('.duzenle').click(function(e) {
                                var editId = $(this).data('edit_id');
                                var editName = $(this).data("edit_name");

                                Swal.fire({
                                    title: 'Kategori Adını Düzenle',
                                    html: '<div>' +
                                        ' <div class="mb-3">' +
                                        '<label style="float: left;" for="kategoriEditAdi" class="form-label">Kategori Adı</label>' +
                                        '<input style="margin:0;margin-left:0;width: 99%;" type="text" value="' +
                                        editName + '"  class="swal2-input" id="kategoriEditAdi">' +
                                        '</div>',
                                    showCancelButton: true,
                                    confirmButtonText: 'Güncelle',
                                    cancelButtonText: 'İptal',
                                    preConfirm: () => {
                                        const kategoriAdi = $('#kategoriEditAdi').val();
                                        // const kategori = $('#kategori').val();

                                        axios.post('/yonetim/kategori/duzelt/{{ $id }}', {
                                                editId: editId,
                                                kategoriAdi: kategoriAdi,

                                            })
                                            .then(response => {
                                                console.log(response.data);

                                                if (response.data === 'basarili') {
                                                    // Kategori eklendikten sonra başarı mesajı göster
                                                    Swal.fire('Başarılı!', 'Kategori Adı Değiştirildi',
                                                            'success')
                                                        .then(() => {
                                                            // Sayfayı yenile
                                                            window.location.reload(true);
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

                            $('.sil').click(function(e) {
                                var deleteId = $(this).data('delete_id');

                                Swal.fire({
                                    title: 'Kategori Silinsinmi?',
                                    text: "Kategoriye Bağlı Alt Kategoriler Varsa Onlarda Silinir",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    cancelButtonText: "İptal",
                                    confirmButtonText: 'Evet Sil!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        axios.delete('/yonetim/kategori/{{ $id }}?id=' + deleteId)
                                            .then(response => {
                                                console.log(response.data);

                                                if (response.data === 'basarili') {
                                                    // Kategori eklendikten sonra başarı mesajı göster
                                                    Swal.fire('Başarılı!', 'Kategori Başarıyla Silindi',
                                                            'success')
                                                        .then(() => {
                                                            // Sayfayı yenile
                                                            window.location.reload(true);
                                                        });
                                                } else {
                                                    Swal.fire('Hata!',
                                                        'Kategori Silinirken bir hata oluştu.', 'error');
                                                }
                                            })
                                            .catch(error => {
                                                Swal.fire('Hata!', 'Kategori silinirken bir hata oluştu.',
                                                    'error');
                                            });

                                        return false;
                                    }
                                })
                            });

                        });
                    </script>
                </div>
            </div>

        </div>
    </div>
@endsection
