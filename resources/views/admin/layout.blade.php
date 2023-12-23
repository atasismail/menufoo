<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Menufoo</title>

    <script src="{{ asset('/cdn/js/jquery-3.6.3.js') }}"></script> <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.2/css/all.css">

    <script src="{{ asset('/cdn/js/axios.min.js') }}"></script>



    <script src="{{ asset('cdn/js/sweetalert2.all.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('cdn/css/sweetalert2.min.css') }}" />


    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>


    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/cdn/css/lte.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('/cdn/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cdn/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/cdn/css/buttons.bootstrap4.min.css') }}">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4814358206440814"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/cdn/css/leaflet.css') }}" />
    <link rel="stylesheet" href="{{ asset('/cdn/css/Control.FullScreen.css') }}" />
    <script src="{{ asset('/cdn/js/leaflet.js') }}"></script>
    <script src="{{ asset('/cdn/js/Control.FullScreen.js') }}"></script>

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

</head>
<style>
    /* width */
    ::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #888;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #555;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

<body class="hold-transition  old-transition  layout-top-nav layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav style="position: sticky;top: 0;" class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('admin.index') }}" class="nav-link">ANASAYFA</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="/cdn/image/{{ Auth::user()->user_file ?? 'resim.png' }}" class="user-image"
                            alt="User Image">
                        <span style="color: black; font-weight: bold;" class="hidden-xs">
                            {{ Auth::user()->displayName }}</span>
                    </a>
                    <ul style="backdrop-filter: blur(30px);background-color: #ffffffb3; margin-left: -100%; border-radius: 25px;"
                        class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="/cdn/image/{{ Auth::user()->user_file ?? 'resim.png' }}" class="user-image"
                                alt="User Image">
                            <p>
                                {{ Auth::user()->displayName }}
                            <p>YÖNETİCİ</p>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer" style="border-radius: 0 0 25px 25px; background-color: #2c3035;">
                            <div style="float: left;" class="pull-left">
                                <a style="border-radius: 15px;" href="{{ route('user.edit', Auth::user()->id) }}"
                                    class="btn btn-info btn-flat">Profil Düzenle</a>
                            </div>
                            <div style="float: right;" class="pull-right">
                                <a style="border-radius: 15px;" href="{{ route('admin.logout') }}"
                                    class="btn btn-danger btn-flat">Güvenli
                                    Çıkış</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->

        <div class="content-wrapper">
            @yield('content')
        </div>
        <footer style="background-color: #111111; color: white;" class="main-footer">
            <div class="float-right d-none d-sm-inline">
                menufoo
            </div> <strong>Copyright &copy; 2022 <a href="https://midyatgo.com">MenuFoo</a>.</strong>
        </footer>

        @if (session()->has('infoSuccess'))
            <script type="text/javascript">
                Swal.fire(
                    'Başarılı',
                    "{{ session('infoSuccess') }}",
                    'success'
                );
            </script>
        @endif
        @if (session()->has('infoError'))
            <script type="text/javascript">
                Swal.fire(
                    'Başarısız',
                    "{{ session('infoError') }}",
                    'error'
                );
            </script>
        @endif

        @if (session()->has('success'))
            <script type="text/javascript">
                alertify.success("{{ session('success') }}");
            </script>
        @endif
        @if (session()->has('error'))
            <script type="text/javascript">
                alertify.error("{{ session('error') }}");
            </script>
        @endif
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                alertify.error('{{ $error }}');
            </script>
        @endforeach
        <script src="{{ asset('/cdn/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('/cdn/js/bootstrap.bundle.min1.js') }}"></script>

        <script src="{{ asset('/cdn/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/cdn/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/cdn/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/cdn/js/responsive.bootstrap4.min.js') }}"></script>

        {{-- <script src="{{ asset('/cdn/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('/cdn/js/buttons.bootstrap4.min.js') }}"></script> --}}


        <script>
            $(function() {
                $("#example1").DataTable({
                    "paging": true,
                    "searching": true,
                    "responsive": false,
                    "ordering": true,
                    "lengthChange": true,
                    "autoWidth": true,


                });

            });
        </script>

</body>

</html>
