@extends('genetsis-admin::layouts.app')

@section('content')
    @include('genetsis-admin::partials.section-header')

    <div class="card">
        @yield('section-card-header')

        <div class="card-block">
            @include('genetsis-admin::partials.show_errors')

            @yield('section-content')
        </div>
    </div>
@endsection
