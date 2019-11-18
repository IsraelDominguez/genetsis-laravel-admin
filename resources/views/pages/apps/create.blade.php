@extends('genetsis-admin::layouts.admin-sections')

@section('section-card-header')
    @component('genetsis-admin::partials.card-header')
        @slot('card_title')
            New {{ Str::title($section) }}
        @endslot
    @endcomponent
@endsection


@section('section-content')

    <form action="{{ route('apps.store') }}" id="form" method="POST">
        {{ csrf_field() }}

        @include('genetsis-admin::pages.apps.form')

    </form>

@endsection

@push('custom-js')
    <script>
        $(document).ready(function() {
            $("#submit").click(function() {
                $("#form").submit();
            });

            @if ($message = Session::get('success'))
            notify('{{ $message }}');
            @endif
        });
    </script>
@endpush
