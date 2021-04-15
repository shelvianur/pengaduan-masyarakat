<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link href="{{asset('adminn/assets/img/brand/OriPutih.png')}}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('adminn/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('adminn/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('adminn/assets/vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{asset('adminn/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">

    <!-- baru -->
    <link rel="stylesheet" href="{{asset('adminn/dist/image-uploader.min.css')}}"> 
    <link rel="stylesheet" href="{{asset('adminn/dist/baru.css')}}"> 
    
    <script src="{{asset('adminn/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    
    <!-- data table -->
    <link rel="stylesheet" href="{{ asset('adminn/assets/vendor/datatables/dataTables.bootstrap4.min.css')}}">
    <script src="{{asset('adminn/assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminn/assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    
    <!-- date picker -->
    <link rel="stylesheet" href="{{ asset('adminn/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">
    <script src="{{ asset('adminn/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    
</head>

<body>
    <!-- Sidenav -->
    @include('layouts.includes._sidebar')

    <div class="main-content">
        @include('layouts.includes._topnavbar')
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    @yield('content1')
                </div>
            </div>
        </div>

        <div class="container-fluid mt--7">
            <div class="row">
                @yield('content2')
            </div>
        </div>
    </div>
    <!-- Main content -->
    <!-- Argon Scripts -->
    <!-- Core -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script> -->
    <script src="{{asset('adminn/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Optional JS -->
    <script src="{{asset('adminn/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('adminn/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <!-- Argon JS -->
    <script src="{{asset('adminn/assets/js/argon.js?v=1.0.0')}}"></script>
    <script src="{{asset('adminn/dist/image-uploader.min.js')}}"></script>

    <script>
        $(document).on('click', '#btnDelete', function () {
            return confirm('Anda yakin akan menghapus data ini?')
        });
    </script>
</body>
</html>
