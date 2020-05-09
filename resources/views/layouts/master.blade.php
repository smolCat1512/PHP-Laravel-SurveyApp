<!doctype html>
<html>

<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>

        <article class="container row">
            @include('includes.messages')
            @yield('content')

        </article>


        <footer class="row">
            @include('includes.footer')
        </footer>
    </div><!-- close container -->

</body>

</html>
