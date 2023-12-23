<section class="content">
    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">

                    <div style="text-align: center;" class="col-12">
                        <img style="max-width: 400px;" src="{{ asset('cdn/tema/' . $data->kapak_resmi) }}"
                            class="product-image" alt="Product Image">
                    </div>

                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $data->tema_adi }} </p>

                        <hr>
                        <h4>Satın Alma Seçenekleri</h4>
                        <div>
                            @foreach ($data->plan as $veri)
                                <label class="btn btn-default text-center">
                                    <input type="radio" name="secim" ad="{{ $veri->plan_adi }}"
                                        code="{{ $veri->referans_kod }}" periyot="{{ $veri->periyot }}"
                                        value="{{ number_format($veri->fiyat) }}" autocomplete="off" checked="">
                                    {{ $veri->plan_adi }}
                                    <br>
                                    <span> {{ number_format($veri->fiyat) }} ₺</span>
                                </label>
                            @endforeach
                        </div>

                        <h4 class="mt-3">Seçilen Paket</h4>


                        <div style="border-radius: 8px;" class="bg-indigo py-2 px-3 mt-4">
                            {{-- 30 Gün Ücretsiz --}}
                            <h2 class="mb-0 tutar">
                                {{ number_format($data->plan[0]->fiyat) }} ₺
                            </h2>
                            <h4 class="mt-0 aylik">
                                {{ $data->plan[0]->plan_adi }}
                            </h4>

                        </div>


                        <div class="mt-4 ">
                            {{-- <form action="{{ route('temalar.odemeSayfa') }}" method="post"> --}}

                            {{-- @csrf --}}
                            <input id="referans_kod" type="text" name="referans_kod" id=""
                                value="{{ $data->plan[0]->referans_kod }}" hidden>
                            <input id="periyot" type="text" name="periyot" id=""
                                value="{{ $data->plan[0]->periyot }}" hidden>
                            <button style="border-radius: 5px;" class="btn btn-primary btn-lg btn-flat satin_al"
                                type="button">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Satın Al
                            </button>
                            {{-- </form> --}}

                        </div>



                </div>
            </div>
            <br><br>
            <div class="card">
                <div class="card-body">
                    {!! $data->tema_aciklama !!}

                    <br>
                    @php
                        $parcala = explode(',', $data->tema_resimleri);
                    @endphp

                    <div class="row">
                        @foreach ($parcala as $resimler)
                            <div class="col-md-2">
                                <div data-fancybox="gallery" href="/cdn/tema/{{ $resimler }}">
                                    <img class="img-thumbnail" src="/cdn/tema/{{ $resimler }}" alt="">
                                </div>
                                <br>
                            </div>
                        @endforeach

                    </div>
                    <br>
                </div>

            </div>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>

<script>
    $(document).ready(function() {
        $('.satin_al').click(function(e) {
            Swal.fire("Bizimle İletişime Geçiniz");

        });
        $('input[type="radio"][name="secim"]:first').prop('checked', true);
        $("[data-fancybox]").fancybox({
            animationEffect: "slide",
            animationEffectDuration: 500,
            loop: true,
            closeExisting: true,
            backFocus: true,
            touch: true,
            wheel: true,
        });

        $(":radio").click(function() {
            var ad = $(this).attr("ad");
            var fiyat = $(this).val();


            var code = $(this).attr("code");
            $('#referans_kod').val(code);

            var periyot = $(this).attr("periyot");
            $('#periyot').val(periyot);

            $('.tutar').text(fiyat + " ₺");
            $('.aylik').text(ad);
        });
    });
</script>
