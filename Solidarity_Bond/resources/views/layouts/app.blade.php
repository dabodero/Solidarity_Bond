<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.head')
        @yield('ajoutsHead')
    </head>

    <body>
        @include('layouts.navbar')

        @yield('content')

        @include('layouts.footer')

        @include('layouts.scripts-communs')
        @yield('ajoutsScripts')

        @stack('flashScripts')
    </body>
</html>




