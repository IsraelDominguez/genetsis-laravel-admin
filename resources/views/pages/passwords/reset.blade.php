@extends('genetsis-admin::layouts.auth')

@section('content')
    <div class="login__block__body">

        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <p class="mt-4">Lorem ipsum dolor fringilla enim feugiat commodo sed ac lacus.</p>

            <div class="form-group form-group--centered {{ $errors->has('email') ? ' has-danger' : '' }}">
                @if ($errors->has('email'))
                    <label class="form-control-label">{{ $errors->first('email') }} </label>
                @endif
                <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' form-control-danger' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group form-group--centered{{ $errors->has('password') ? ' has-danger' : '' }}">
                @if ($errors->has('password'))
                    <label class="form-control-label">{{ $errors->first('password') }}</label>
                @endif
                <input id="password" type="password" class="form-control{{ $errors->has('email') ? ' form-control-danger' : '' }}" name="password" required placeholder="Password">
                <i class="form-group__bar"></i>
            </div>

            <div class="form-group form-group--float form-group--centered {{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                @if ($errors->has('password_confirmation'))
                    <label class="form-control-label">{{ $errors->first('password_confirmation') }}</label>
                @endif
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <i class="form-group__bar"></i>
            </div>

            <button type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>
        </form>
    </div>

@endsection
