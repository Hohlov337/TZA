<!doctype html>
<html lang="ua">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body>
<main class="container">
    <center><h1>On-line курси</h1>
        @include('admin.layout.nav')
    </center>
    @yield('admin_content')
</main>
</body>
</html>
