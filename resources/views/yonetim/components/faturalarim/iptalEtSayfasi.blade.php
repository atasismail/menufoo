@extends('yonetim.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div style="padding: 10px;">
                <button class="btn btn-primary" onclick="window.history.back()" type="submit">Geri Git</button>
            </div>
            <div class="col-md-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Abonelik İptali</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>

                    <div class="card-body">



                        <div class="alert alert-danger col-12" role="alert">
                            UYARI: Abone iptali sonrasında oluşturulan QR kod linklerinin işlevsiz hale gelecek
                        </div>


                    </div>

                    <div class="card-footer">


                        <button style="width: 40%; margin-top: 0.5em; margin: 0 auto;background: red;"
                            class="iptalEt btn btn-danger btn-lg btn-block">Aboneliği İptal Et</button>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <script>
        $('.iptalEt').click(function(e) {


            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'm-2 btn btn-success',
                    cancelButton: 'm-2 btn btn-danger'
                },
                buttonsStyling: false


            })

            swalWithBootstrapButtons.fire({
                title: 'Aboneliğinizi İptal Etmek İstiyormusunuz?',
                text: "Uyarı: Geri Dönüşü Yok!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet İptal Et',
                cancelButtonText: 'Hayır',
                reverseButtons: false
            }).then((result) => {
                if (result.isConfirmed) {

                    axios.post("/yonetim/faturalarim/iptalEt/{{ $referans_kod }}")
                        .then(function(response) {

                            if (response.data == "success") {
                                swalWithBootstrapButtons.fire(
                                    'Aboneliğiniz İptal Edildi!',
                                    "",
                                    'success'
                                )
                            } else {
                                swalWithBootstrapButtons.fire(
                                    'İşlem İptal Edildi',
                                    response.data,
                                    'error'
                                )
                            }

                        }).catch(function(error) {
                            console.log(error);
                        });


                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'İşlem İptal Edildi',
                        '',
                        'error'
                    )
                }
            })




            // Swal.fire({
            //     title: 'Aboneliğinizi İptal Etmek İstiyormusunuz?',
            //     text: "Uyarı: Geri Dönüşü Yok!",
            //     icon: 'warning',
            //     showCancelButton: true,
            //     confirmButtonColor: '#3085d6',
            //     cancelButtonColor: '#d33',
            //     confirmButtonText: 'Evet, iptal Etmek İstiyorum!'
            // }).then((result) => {
            //     if (result.isConfirmed) {
            //         Swal.fire(
            //             'Deleted!',
            //             'Your file has been deleted.',
            //             'success'
            //         )
            //     }
            // })


        });
    </script>
@endsection
