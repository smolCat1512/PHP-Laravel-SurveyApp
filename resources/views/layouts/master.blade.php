<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <article class="row">

         @yield('content')

    </article>

    <footer class="row">
    @include('includes.footer')
    </footer>
</div><!-- close container -->

</body>
</html>