<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/images/forum-icon.png') }}">
    <title>Forúm</title>
    <!--Icons-->
    <script src="https://kit.fontawesome.com/826671e166.js" crossorigin="anonymous"></script>
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row layout-identification" style="">
            <div class="col-md-9 col-lg-10">
                <div class="card" id="main-card">
                    <div class="card-header card-color">
                        <h1 class="page-title mb-3" style="">
                            @yield('title')
                        </h1>
                    </div>
                    <div class="card-body">
                        @include('shared/_flash')
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
