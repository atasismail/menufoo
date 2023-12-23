<div class="table-responsive">
    <br>


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Sistem Hataları</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th style="width: 12px;">No</th>
                        <th>log adi</th>
                        <th>log aciklama</th>
                        <th>dosya_adi</th>
                        <th>satir_numarasi</th>
                        <th width="5">Hata Düzeltildimi ?</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $sayi = 1;
                        // $sayi = count($data['log']);
                    @endphp
                    @foreach ($data as $log)
                        <tr id="item-{{ $log->id }}">
                            <td>{{ $sayi++ }}</td>
                            <td>{{ $log->log_adi }}</td>
                            <td>{{ $log->log_aciklama }}</td>
                            <td> {{ $log->dosya_adi }}</td>
                            <td>{{ $log->satir_numarasi }}</td>
                            {{-- {{ route('log.show', $log->id) }} --}}
                            <td style="text-align: center;"><a href=""><i style="color: green;"
                                        class="fas fa-check"></i></a></td>

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
                    axios.delete("log/" + destroy_id)
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
