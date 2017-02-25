<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>@yeild('title')</title>

    <meta name="description" content="enabling volunteers to connects with volunteering events">
    <meta name="keywords" content="volunteer, volunteering, volunteer events, non-profit, charity">
    <meta @yield('meta')>

    <!-- Move this to home page when built out.  do not keep in master -->
    <meta name="robots" contents="follow, index"

    <meta name="author" content="carrot_path">

    <!-- any additional css -->
    @yield('header')

    <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
    @include('layouts.nav')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')

    <!-- any additional js -->
    @yield('scripts')
</body>
</html>
