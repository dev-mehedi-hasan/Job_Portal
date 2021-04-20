<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
        {{--CSS--}}
        @include('layouts.partials.style')
    </head>
    <body>
        @section('preloader')
        @include('layouts.partials.preloader')
        @show

        @section('navbar')
        @include('layouts.partials.navbar')
        @show

        @yield('content')

        @section('footer')
        @include('layouts.partials.footer')
        @show

        @include('layouts.partials.script')
    </body>
</html>
