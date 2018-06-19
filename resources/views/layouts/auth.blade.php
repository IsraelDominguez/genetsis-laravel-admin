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

<div class="login">
    <div class="login__block active">
        <div class="login__block__header">
        <img src="{{Asset::img('logo.png')}}" alt="{{ config('app.name', 'Laravel') }}">

            {{--<div class="actions actions--inverse login__block__actions">--}}
                {{--<div class="dropdown">--}}
                    {{--<i data-toggle="dropdown" class="zmdi zmdi-more-vert actions__item"></i>--}}

                    {{--<div class="dropdown-menu dropdown-menu-right">--}}
                        {{--<a class="dropdown-item" href="{{ route('login') }}">Already have an account?</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('register') }}">Create an account</a>--}}
                        {{--<a class="dropdown-item" href="{{ route('password.request') }}">Forgot password?</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

        @yield('content')

    </div>
</div>

<script src="{{ Asset::url('main_js') }}"></script>

</body>
</html>