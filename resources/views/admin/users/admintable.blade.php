<div class="table-responsive">

    <div class="card">

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Ad Soyad</th>
                        <th>Tel No</th>
                        <th>Vipmi</th>
                        <th>Aktifmi</th>
                        <th>Rolü</th>
                        <th width="5">Görüntüle</th>
                        <th width="5">Düzenle</th>
                        {{-- <th width="5">Sil</th> --}}
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
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->displayName }}</td>
                            <td>{{ $user->tel_no }}</td>
                            <td> {{ $user->vip == 1 ? 'Evet' : 'Hayır' }}</td>
                            <td> {{ $user->active == 1 ? 'Aktif' : 'Banlı' }}</td>
                            <td>{{ $user->role }}</td>

                            <td style="text-align: center;"><a href="{{ route('user.show', $user->id) }}"><i
                                        style="color: purple;" class="fas fa-eye fa-2x"></i></a></td>
                            <td style="text-align: center;"><a href="{{ route('user.edit', $user->id) }}"><i
                                        style="color: orange;" class="fas fa-pen-square fa-2x"></i></a></td>
                            {{-- <td class="" style="text-align: center;"><a href="javascript:void(0)"><i
                                        id="@php echo $user->id @endphp " style="color: red;"
                                        class="fas fa-trash-alt fa-2x"></i></a></td> --}}
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
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
                    axios.delete("user/" + destroy_id)
                        .then(function(response) {
                            if (response) {
                                $("#item-" + destroy_id).remove();
                                alertify.success('Silme işlem Başarılı');
                            } else {
                                alertify.error('silme işlem Başarısız');
                            }
                        }).catch(function(error) {
                            console.log(error);
                        });
                },
                function() {
                    alertify.error('Silme İşlemi İptal Edildi');
                }
            )
        });
</script>
