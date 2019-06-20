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
        <table id="data-users"  class="table table-bordered table-striped">
            <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
{{--            <tbody>--}}
{{--            @foreach ($data as $user)--}}
{{--                <tr>--}}
{{--                    <th scope="row">{{ ++$i }}</th>--}}
{{--                    <td>{{ $user->name }}</td>--}}
{{--                    <td>{{ $user->email }}</td>--}}
{{--                    <td>--}}
{{--                        @if(!empty($user->getRoleNames()))--}}
{{--                            @foreach($user->getRoleNames() as $v)--}}
{{--                                <label class="badge badge-success">{{ $v }}</label>--}}
{{--                            @endforeach--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                    <td>--}}
{{--                        <div class="actions">--}}
{{--                            <a class="actions__item zmdi zmdi-edit" href="{{ route('users.edit',$user->id) }}"></a>--}}
{{--                            <a class="actions__item zmdi zmdi-delete" onclick="javascript:$('#form-{{$user->id}}').submit();" id="del"></a>--}}
{{--                        </div>--}}
{{--                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" id="form-{{$user->id}}">--}}
{{--                            {{ csrf_field() }}--}}
{{--                            {{ method_field('DELETE') }}--}}
{{--                        </form>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
        </table>
    </div>
@endsection

@push('custom-js')
    <script>
        $(document).ready(function() {

            var table = $('#data-users').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{route('users.api')}}',
                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'email'},
                    {data: 'options', name: 'options', orderable: false, searchable: false, className: 'options-actions'},
                    {data: 'delete', name: 'delete', orderable: false, searchable: false, className: 'options-delete'},
                ],
                order: [[0,'desc']]
            });

            $('#data-users tbody').on('click', 'td.options-delete', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                var id = row.data().id;

                swal({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this User!',
                    type: 'warning',
                    showCancelButton: true,
                    buttonsStyling: false,
                    confirmButtonClass: 'btn btn-danger',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonClass: 'btn btn-secondary'
                }).then(function(){
                    delete_url = '{{route('users.destroy', ':id')}}';
                    delete_url = delete_url.replace(':id', id);

                    $.ajax({
                        url: delete_url,
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function (response) {
                            notify(response.message);
                            table.ajax.reload();
                        },
                        error: function(response) {
                            notify('An error has ocurred','top','right','','danger');
                        }
                    });


                }).catch(swal.noop);
            });

            @if ($message = Session::get('success'))
                notify('{{ $message }}');
            @endif
        });
    </script>
@endpush
