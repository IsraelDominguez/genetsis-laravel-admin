@extends('genetsis-admin::layouts.admin-sections')


@section('section-card-header')
    @component('genetsis-admin::partials.card-header')
        @slot('card_title')
            {{ str_plural(title_case($section)) }} List
        @endslot

        <a class="btn btn-success btn--icon-text waves-effect" href="{{ route(str_plural($section).'.create') }}"><i class="zmdi zmdi-plus"></i> New {{ title_case($section) }}</a>
    @endcomponent
@endsection


@section('section-content')
    <div class="table-responsive">
        <table class="table table-sm table-striped mb-3">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $user)
                <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if(!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a class="actions__item zmdi zmdi-edit" href="{{ route('users.edit',$user->id) }}"></a>
                            <a class="actions__item zmdi zmdi-delete" onclick="javascript:$('#form-{{$user->id}}').submit();" id="del"></a>
                        </div>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="form-{{$user->id}}">
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
    @if ($message = Session::get('success'))
    <script>
        $(document).ready(function() {
            notify('{{ $message }}');
        });
    </script>
    @endif
@endpush