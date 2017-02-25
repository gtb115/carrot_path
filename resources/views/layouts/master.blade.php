<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@yeild('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="enabling volunteers to connects with volunteering events">
    <meta name="keywords" content="volunteer, volunteering, volunteer events, non-profit, charity">
    <meta @yield('meta')>

    <!-- Move this to home page when built out.  do not keep in master -->
    <meta name="robots" contents="follow, index">

    <meta name="author" content="carrot_path">

    <!-- any additional css -->
    @yield('header')

</head>

<body>
    @include('layouts.nav')

    <!-- page content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- foot/legal -->
    @include('layouts.footer')

    <!-- any additional js -->
    @yield('scripts')
</body>
</html>
