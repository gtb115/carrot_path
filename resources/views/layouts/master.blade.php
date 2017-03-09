<!doctype html>

<html lang="{{ config('app.locale') }}">
<head>
    <title>@yield('title')</title>

    {{-- fixes axios webpack problem --}}
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="enabling volunteers to connects with volunteering events">
    <meta name="keywords" content="volunteer, volunteering, volunteer events, non-profit, charity">
    <meta name="author" content="carrot_path">
    @yield('meta')

    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/nav.css" rel="stylesheet">

    @yield('header')
</head>



<body>
    @include('layouts.nav')
    <div class="container">
        {{-- @include('layouts.messages') --}}
        @yield('content')
    </div>


    <!-- foot/legal -->
    @include('layouts.footer')


    <!-- custom js for this template -->
    <script src="/js/app.js"></script>

    <!-- any additional js -->
    @yield('scripts')
</body>
</html>
