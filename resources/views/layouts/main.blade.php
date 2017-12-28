<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('partials.head')
    </head>
    <body>
        @include('partials.navbar')
        @include('partials.sidebar')

        <section class="main container is-fluid">
            @yield('content')
        </section>

        <!-- Scripts -->
        @yield('js-before')
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('js-after')
    </body>
</html>
