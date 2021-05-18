<!doctype html>
<html lang="ua">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
</head>
<body>
<main class="container">
    <center><h1>On-line курси</h1>
        @include('guest.layout.nav')
    </center>
    @yield('content')
</main>
</body>
</html>
