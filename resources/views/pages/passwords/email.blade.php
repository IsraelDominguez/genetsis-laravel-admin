@extends('genetsis-admin::layouts.auth')

@section('content')
    <div class="login__block__body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <p class="mt-4">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}

            <div class="form-group form-group--centered {{ $errors->has('email') ? ' has-danger' : '' }}">
                @if ($errors->has('email'))
                    <label class="form-control-label">{{ $errors->first('email') }} </label>
                @endif
                <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                <i class="form-group__bar"></i>
            </div>

            <button type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
        </form>
    </div>
@endsection
