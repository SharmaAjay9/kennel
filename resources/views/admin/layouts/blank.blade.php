<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ env('APP_URL')}}">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <title>{{ config('app.name', 'Matrimonial') }}</title>

    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">

    <!-- aiz core css -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/vendors.css?v='.rand()) }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/aiz-core.css?v='.rand()) }}">

    <script>
        var AIZ = AIZ || {};
    </script>
</head>
<body>
    <div class="aiz-main-wrapper d-flex">

        <div class="flex-grow-1">
            @yield('content')
        </div>

    </div><!-- .aiz-main-wrapper -->
    <script src="{{ URL::to('assets/js/vendors.js?v='.rand()) }}" ></script>
    <script src="{{ URL::to('assets/js/aiz-core.js?v='.rand()) }}" ></script>

    @yield('script')
</body>
</html>
