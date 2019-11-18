@extends('genetsis-admin::layouts.admin-sections')

@section('section-card-header')
    @component('genetsis-admin::partials.card-header')
        @slot('card_title')
            Edit {{ Str::title($section) }}
        @endslot
    @endcomponent
@endsection

@section('section-content')
    <form action="{{ route('apps.update', $druid_app->client_id) }}" id="form" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        @include('genetsis-admin::pages.apps.form')
    </form>

    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Entry Points</h2>
            <small class="card-subtitle">If you need, you can refresh from Dru-ID.</small>
            <div class="actions">
                <a href="{{route('apps.refresh', $druid_app->client_id)}}" id="refresh" class="actions__item zmdi zmdi-refresh"></a>
            </div>
        </div>

        <div class="card-block">
            <div class="table-responsive">
                <table class="table table-sm table-striped mb-3">
                    <thead class="thead-inverse">
                    <tr>
                        <th>Key</th>
                        <th>Name</th>
                        <th>Ids</th>
                        <th>Fields</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($druid_app->entrypoints as $entrypoint)
                        <tr>
                            <td>{{ $entrypoint->key }}</td>
                            <td>{{ $entrypoint->name }}</td>
                            <td>{{ json_encode($entrypoint->ids) }}</td>
                            <td>{{ json_encode($entrypoint->fields) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
