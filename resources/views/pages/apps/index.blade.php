@extends('genetsis-admin::layouts.admin-sections')


@section('section-card-header')
    @component('genetsis-admin::partials.card-header')
        @slot('card_title')
            {{ Str::plural(Str::title($section)) }} List
        @endslot

        <a class="btn btn-success btn--icon-text waves-effect" href="{{ route(Str::plural($section).'.create') }}"><i class="zmdi zmdi-plus"></i> New {{ Str::title($section) }}</a>
    @endcomponent
@endsection


@section('section-content')
    <div class="table-responsive">
        <table class="table table-sm table-striped mb-3">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Client ID</th>
                    <th>Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $druid_app)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $druid_app->client_id }}</td>
                    <td>{{ $druid_app->name }}</td>
                    <td>
                        <div class="actions">
                            <a class="actions__item zmdi zmdi-edit" href="{{ route('apps.edit',$druid_app->client_id) }}"></a>
                            <a class="actions__item zmdi zmdi-delete del" data-id="{{$druid_app->client_id}}"></a>
                        </div>
                        <form action="{{ route('apps.destroy', $druid_app->client_id) }}" method="POST" id="form-{{$druid_app->client_id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


@push('custom-js')
    <script>
        $(document).ready(function() {
            $('.del').click(function(){
                clicked = this.dataset.id;
                swal({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this app!',
                    type: 'warning',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonClass: 'btn btn-secondary'
                }).then(function(){
                    $('#form-'+clicked).submit()
                }).catch(swal.noop);
            });

            @if ($message = Session::get('success'))
                notify('{{ $message }}');
            @endif
        });
    </script>
@endpush
