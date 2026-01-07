<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div></div>
            <h1 class="header__logo">FashionablyLate</h1>
            <nav class="header__nav">
                @yield('nav')
            </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>