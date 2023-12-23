@extends('admin.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title"> Temalar</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div align="right">
                            <a href="{{ route('user.temaEkleForm', $id) }}"> <button class="btn btn-success"
                                    type="submit">Ekle</button></a>

                        </div>
                        <br>
                        <div class="table-responsive">


                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>tel_no</th>
                                        <th>Tema Adı</th>
                                        <th>baslangic_tarihi</th>
                                        <th>Aktifmi</th>
                                        <th width="5" style="max-width: 65px; white-space: nowrap;">Düzenle</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data['user']->tema) != 0)
                                        @php
                                            $sayi = 1;
                                            // $sayi = count($data['user']);
                                        @endphp




                                        @foreach ($data['user']->temalarim as $tema)
                                            <tr id="item-{{ $tema->id }}">
                                                <td>{{ $sayi++ }}</td>
                                                <td>{{ $tema->tel_no }}</td>
                                                <td>{{ $tema->plan_adi }}</td>
                                                <td>{{ $tema->olusturma_tarihi }}</td>
                                                <td> {{ $tema->active == 1 ? 'Aktif' : 'Pasif' }}</td>
                                                <td style="text-align: center;"><a
                                                        href="{{ route('user.temaDuzenleForm', $tema->id) }}"><i
                                                            style="color: rgb(255, 156, 7); :ho"
                                                            class="fa-duotone fa-edit fa-2x"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>


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
                                        axios.delete("user/" + destroy_id)
                                            .then(function(response) {
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
                                    // alertify.confirm('Silme İşlemini Onaylayın', 'Silinirse Geri Alınamaz', function() {
                                    //         axios.delete("user/" + destroy_id)
                                    //             .then(function(response) {
                                    //                 if (response) {
                                    //                     $("#item-" + destroy_id).remove();
                                    //                     alertify.success('Silme işlem Başarılı');

                                    //                 } else {
                                    //                     alertify.error('silme işlem Başarısız');
                                    //                 }
                                    //             }).catch(function(error) {
                                    //                 console.log(error);
                                    //             });
                                    //     },
                                    //     function() {
                                    //         alertify.error('Silme İşlemi İptal Edildi');
                                    //     }
                                    // )
                                });
                        </script>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
