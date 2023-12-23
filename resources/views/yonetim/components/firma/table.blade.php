<div class="table-responsive">
    <div align="right">
        <a href="{{ route('firma.create') }}"> <button class="btn btn-success" type="submit">YENİ EKLE</button></a>

    </div>
    <br>
    @isset($data)
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 15px;">No</th>
                    <th style="width: 150px;">firma Logo</th>
                    <th>firma Adı</th>
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
                                src="/cdn/firma/{{ $veri->firma_logo ?? 'resim.png' }}" alt=""></td>
                        <td>{{ $veri->firma_adi }}</td>


                        <td style="text-align: center;"><a href="{{ route('firma.edit', $veri->id) }}"><i
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
                axios.delete("firma/" + destroy_id)
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

        });
</script>
