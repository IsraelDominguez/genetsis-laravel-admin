<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ Asset::url('main_css') }}" rel="stylesheet">
</head>

<body data-ma-theme="cyan">
    <main class="main">
        {{--<div class="page-loader">--}}
            {{--<div class="page-loader__spinner">--}}
                {{--<svg viewBox="25 25 50 50">--}}
                    {{--<circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />--}}
                {{--</svg>--}}
            {{--</div>--}}
        {{--</div>--}}

        <header class="header">
            @include("genetsis-admin::partials.header")
        </header>

        <aside class="sidebar">
            @include("genetsis-admin::partials.menu")
        </aside>

        <section class="content">
            @yield('content')

            @include("genetsis-admin::partials.footer")
        </section>
    </main>

    <!-- Scripts -->
    <script src="{{ Asset::url('main_js') }}"></script>

    @stack('custom-js')
</body>
</html>
