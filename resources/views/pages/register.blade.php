@extends('genetsis-admin::layouts.auth')

@section('content')
    <div class="login__block__body">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group form-group--centered {{ $errors->has('name') ? ' has-danger' : '' }}">
                @if ($errors->has('name'))
                    <label class="form-control-label">{{ $errors->first('name') }} </label>
                @endif
                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' form-control-danger' : '' }}" name="name" value="{{ old('name') }}" required placeholder="Name">
                <i class="form-group__bar"></i>
            </div>

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

            <div class="form-group form-group--float form-group--centered">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                <label for="password-confirm">Confirm Password</label>
            </div>

            <button type="submit" class="btn btn--icon login__block__btn"><i class="zmdi zmdi-long-arrow-right"></i></button>

        </form>
    </div>
@endsection
