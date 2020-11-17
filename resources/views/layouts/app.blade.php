<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!--Icons-->
  <script src="https://kit.fontawesome.com/826671e166.js" crossorigin="anonymous"></script>

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    defer
  </script>

  <script src="{{ mix('/js/app.js') }}"></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
    @include('layouts/_header')
    <div class="row mt-5">
      <div class="col-md-12 col-lg-12">
        <div class="card mt-5">
          <div class="card-header card-color">
            <h1 class="page-title mb-3">
              <span class="d-lg-block mt-1 text-muted font-weight-bold">
                @yield('title')
              </span>
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