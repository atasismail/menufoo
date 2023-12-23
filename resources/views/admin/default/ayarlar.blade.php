@extends('admin.layout')
@section('content')
    <style>
        .basliklar {
            padding: 4px;
            border-radius: 8px;
            background: #F7F8FB;
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Sistem Ayarları</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('ayarlarpost') }}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div style="margin-top: -25px; text-align: center;" class="form-group col-md-6">
                                    <br>
                                    <label class="col-form-label">Website Yüklü Resim </label>
                                    <br>
                                    <img width="100" src="/{{ $setting->logo }}" alt="">
                                </div>
                                <div style="margin-top: -25px;" class="form-group col-md-6">
                                    <br>
                                    <label class="col-form-label">Logo Yükle</label>
                                    <input name="logo" type="file" class="form-control">
                                </div>

                                <h5 class="basliklar">Website Ayarları</h5>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Kurumsal Whatsap Numara</label>
                                    <input id="" type="text" class="form-control"
                                        value="{{ $setting->whatsapp }}" name="whatsapp">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">WebSite Adı</label>
                                    <input id="" type="text" class="form-control"
                                        value="{{ $setting->website_adi }}" name="website_adi">
                                </div>


                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Website Tanıtım İçeriği</label>
                                    <br>
                                    <textarea style="width:100%" name="website_icerik" id="" cols="30" rows="5">{{ $setting->website_icerik }}
                                    </textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Google Play Store linki</label>
                                    <input id="" type="text" class="form-control"
                                        value="{{ $setting->play_store_link }}" name="play_store_link">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">App Store linki</label>
                                    <input id="" type="text" class="form-control"
                                        value="{{ $setting->app_store_link }}" name="app_store_link">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">App Galery Huawei linki</label>
                                    <input id="" type="text" class="form-control"
                                        value="{{ $setting->app_galery_link }}" name="app_galery_link">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">WebSite Linki</label>
                                    <input id="" type="text" class="form-control"
                                        value="{{ $setting->web_site_link }}" name="web_site_link">
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Ne Yapıyoruz Tanıtım İçeriği</label>
                                    <br>
                                    <textarea style="width:100%" name="tanitim" id="" cols="30" rows="5">{{ $setting->tanitim }}
                                    </textarea>
                                </div>

                                <h5 class="basliklar">Seo Ayarları</h5>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Seo Sayfa Adı</label>
                                    <input id="" type="text" class="form-control"
                                        value="{{ $setting->seo_title }}" name="seo_title">
                                </div>


                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Seo Sayfa Açıklaması</label>
                                    <br>
                                    <textarea style="width:100%" name="seo_body" id="" cols="30" rows="5">{{ $setting->seo_body }}
                                    </textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Seo AnaSayfa Link</label>
                                    <input id="" type="text" class="form-control"
                                        value="{{ $setting->seo_link }}" name="seo_link">
                                </div>

                                <h5 class="basliklar">Adsense Ayarları</h5>

                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Firebase Kodu</label>
                                    <textarea style="width:100%" name="firebase" id="" cols="30" rows="5">{{ $setting->firebase }}
                                    </textarea>

                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-form-label">Adsense Kodu</label>
                                    <textarea style="width:100%" name="adsense" id="" cols="30" rows="5">{{ $setting->adsense }}
                                    </textarea>

                                </div>
                                <input type="hidden" name="old_file" value="{{ $setting->logo }}">
                                <div style="margin-top: 1em;" class="form-group col-md-12">
                                    <button type="submit" class="btn btn-dark btn-lg btn-block">Ayarları Kaydet</button>
                                </div>
                            </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
@endsection
