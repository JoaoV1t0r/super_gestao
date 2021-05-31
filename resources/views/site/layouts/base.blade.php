<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield('title')</title>
        <meta charset="utf-8">

        <link rel="stylesheet" href="{{asset('css/main.css')}}">
    </head>

    <body>
        @include('site.layouts._partials.menu')
        @yield('conteudo')
    </body>
</html>