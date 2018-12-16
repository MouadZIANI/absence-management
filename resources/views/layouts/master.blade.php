<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Absences managment</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <!-- Dashboard Core -->
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />
    <!-- Custom css -->
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        @include('layouts.partials._nav-top')
        @include('layouts.partials._nav-bottom')
        <div class="my-3 my-md-5">
            <div class="container">
              <div class="page-header">
                @yield('page-title')
              </div>
              @yield('content')
            </div>
        </div>
      </div>
      @include('layouts.partials._footer')
    </div>
    {{-- Scripts --}}
    <script src="{{ asset('assets/js/require.min.js') }}"></script>
    <script> requirejs.config({ baseUrl: '{{ url('/') }}' }); </script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <!-- Plugins -->
    <script src="{{ asset('assets/plugins/input-mask/plugin.js') }}"></script>
    <!-- Custom js -->
    @yield('scriptes')
  </body>
</html>