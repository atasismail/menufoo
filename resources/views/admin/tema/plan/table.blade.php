<div align="right">
    <a href="{{ route('plan.create', ['id' => $data['id']]) }}"> <button class="btn btn-success" type="submit">YENİ PLAN
            EKLE</button></a>

</div>


<br>
<div class="table-responsive">

    @isset($data)
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 15px;">No</th>
                    <th style="width: 15px;">Plan Adı</th>
                    <th style="width: 15px;">Fiyat</th>
                    <th style="width: 15px;">Fiyat Cinsi</th>
                    <th style="width: 15px;">Peryot</th>
                    <th style="width: 15px;">Peryot Süre Sayısı</th>
                    <th style="width: 15px;">Deneme Gün Sayısı</th>

                    <th width="5">Düzenle</th>
                    <th width="5">Sil</th>
                </tr>
            </thead>
            <tbody>

                @php
                    $sayi = 1;
                    // $sayi = count($data['user']);
                @endphp

                @foreach ($data['plan'] as $veri)
                    <tr id="item-{{ $veri->id }}">
                        <td>{{ $sayi++ }}</td>

                        <td>{{ $veri->plan_adi }}</td>
                        <td>{{ $veri->fiyat }}</td>
                        <td>{{ $veri->fiyat_cinsi }}</td>

                        <td>{{ (($veri->periyot == 'DAILY' ? 'Günlük' : $veri->periyot == 'WEEKLY') ? 'Haftalık' : $veri->periyot == 'MONTHLY') ? 'Aylık' : 'Yıllık' }}
                        </td>
                        <td>{{ $veri->periyot_sure_sayisi }}</td>
                        <td>{{ $veri->deneme_gun_sayisi }}</td>


                        <td style="text-align: center;"><a href="{{ route('plan.edit', $veri->id) }}"><i
                                    style="color: orange;" class="fas fa-pen-square fa-2x"></i></a></td>
                        <td class="" style="text-align: center;">
                            <form action="{{ route('plan.destroy', $veri->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: none; background-color: transparent;">
                                    <i style="color: red;" class="fas fa-trash-alt fa-2x"></i>
                                </button>
                            </form>
                        </td>

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
