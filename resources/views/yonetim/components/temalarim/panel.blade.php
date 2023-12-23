 <div class="row" id="ads">
     @if (count($data) == null)
         <div class="alert alert-primary col-12" role="alert">
             Temanız bullunmamaktadır.Lütfen Tema Mağazasına Giderek Tema Satın Alınız
         </div>

         <div class="col-lg-3 col-6">
             <a style="color: black; cursor: pointer;" href="{{ route('temalar.index') }}">
                 <!-- small box -->
                 <div class="small-box bg-indigo">
                     <div class="inner">
                         <h3>{{ $veri }}</h3>

                         <p>Tema Mağazası</p>
                     </div>
                     <div class="icon">

                         <i class="fa-solid fa-store"></i>
                     </div>

                 </div>
             </a>
         </div>
     @else
         @foreach ($data as $veri)
             <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                 <a href="{{ route('temalarim.tema', $veri->id) }}">
                     <div class="card rounded">
                         <div style="text-align: center;" class="card-image">
                             <span class="card-notify-badge">{{ $veri->plan_adi }} Paket</span>
                             @if ($veri->active != 0)
                                 <span class="card-notify-year bg-success">Aktif</span>
                             @else
                                 <span class="card-notify-year bg-danger">Pasif</span>
                             @endif
                             <img style="text-align: center;" class="img-fluid"
                                 src="/cdn/tema/{{ $veri->tema->kapak_resmi }}" />
                         </div>
                         <div class="card-image-overlay p-2">
                             @if ($veri->firma_id == null)
                                 <span class="card-detail-badge bg-danger">Firmaya Bağlı Değil
                                 </span>
                             @else
                                 <span class="card-detail-badge bg-indigo">{{ $veri->firma->firma_adi }} Firmasına
                                     Bağlı</span>
                             @endif

                         </div>

                     </div>
                 </a>
             </div>
         @endforeach
     @endif

 </div>
 <style>
     #ads .card-notify-badge {
         position: absolute;
         left: -10px;
         top: -5px;
         background: #f2d900;
         text-align: center;
         border-radius: 30px 30px 30px 30px;
         color: #000;
         padding: 5px 10px;
         font-size: 14px;

     }

     #ads .card-notify-year {
         position: absolute;
         right: -10px;
         top: -15px;
         border-radius: 50%;
         text-align: center;
         font-size: 14px;
         width: 50px;
         height: 50px;
         padding: 15px 0 0 0;
     }


     #ads .card-detail-badge {
         text-align: center;
         border-radius: 30px 30px 30px 30px;
         padding: 5px 10px;
         font-size: 14px;
     }



     #ads .card:hover {
         background: #fff;
         box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
         border-radius: 4px;
         transition: all 0.3s ease;
     }

     #ads .card-image-overlay {
         font-size: 20px;

     }


     #ads .card-image-overlay span {
         display: inline-block;
     }
 </style>
