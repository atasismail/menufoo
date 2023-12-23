<div class="table-responsive">


    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Ad Soyad</th>
                <th>Email</th>
                <th>Aktifmi</th>
                <th width="5">Görüntüle</th>
                <th style="max-width: 65px; white-space: nowrap;" width="5">Tema Ekle</th>
                <th style="max-width: 65px; white-space: nowrap;">Panele Git</th>
            </tr>
        </thead>
        <tbody>

            @php
                $sayi = 1;
                // $sayi = count($data['user']);
            @endphp
            @foreach ($data['user'] as $user)
                <tr id="item-{{ $user->id }}">
                    <td>{{ $sayi++ }}</td>
                    <td>{{ $user->displayName }}</td>
                    <td>{{ $user->email }}</td>
                    <td> {{ $user->active == 1 ? 'Aktif' : 'Banlı' }}</td>


                    <td style="text-align: center;"><a href="{{ route('user.show', $user->id) }}"><i
                                style="color: purple;" class="fas fa-eye fa-2x"></i></a></td>
                    <td style="text-align: center;"><a href="{{ route('user.temaEkle', $user->id) }}"><i
                                class="fa-duotone fa-circle-plus fa-2x"></i></a></td>
                    <td style="text-align: center;"><a href="{{ route('user.panel', ['token' => $user->apiToken]) }}"><i
                                class="fa-duotone fa-right-to-bracket fa-2x"></i></a></td>



                </tr>
            @endforeach

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
