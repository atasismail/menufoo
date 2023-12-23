<div align="right">
    <a href="{{ route('tema.create') }}"> <button class="btn btn-success" type="submit">YENİ EKLE</button></a>

</div>
<br>
<div class="table-responsive">

    @isset($data)
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 15px;">No</th>
                    <th style="width: 150px;">Tema Kapak Resmi</th>
                    <th>Tema Adı</th>

                    <th width="5">plan ve ücretlendirme</th>
                    <th width="5">Düzenle</th>
                    <th width="5">Sil</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $sayi = 1;
                    // $sayi = count($data['user']);
                @endphp

                @foreach ($data as $veri)
                    <tr id="item-{{ $veri->id }}">
                        <td>{{ $sayi++ }}</td>
                        <td style="text-align: center"><img width="50" height="50"
                                src="/cdn/tema/{{ $veri->kapak_resmi ?? 'resim.png' }}" alt=""></td>
                        <td>{{ $veri->tema_adi }}</td>

                        <td style="text-align: center;"><a href="{{ route('plan.show', $veri->id) }}"><i
                                    style="font-size: 30px; padding: 10px;"> {{ count($veri->plan) }}</i><i
                                    style="color: rgb(170, 16, 209);" class="fa-solid fa-timer fa-2x"></i></a></td>
                        <td style="text-align: center;"><a href="{{ route('tema.edit', $veri->id) }}"><i
                                    style="color: orange;" class="fas fa-pen-square fa-2x"></i></a></td>
                        <td class="" style="text-align: center;"><a href="javascript:void(0)"><i
                                    id="@php echo $veri->id @endphp " style="color: red;"
                                    class="fas fa-trash-alt fa-2x"></i></a></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    @endisset




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
                axios.delete("tema/" + destroy_id)
                    .then(function(response) {
                        if (response) {

                            if (response) {
                                $("#item-" + destroy_id).remove();
                                alertify.success('Silme işlem Başarılı');

                            } else {
                                alertify.error('silme işlem Başarısız');
                            }
                        } else {

                            alertify.error('işlem Başarısız Tema Planlarını Pasif Yapın');
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
