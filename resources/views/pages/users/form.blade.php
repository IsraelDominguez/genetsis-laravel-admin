<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', isset($user) ? $user->name : null) }}">
            <i class="form-group__bar"></i>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ old('email', isset($user) ? $user->email : null) }}">
            <i class="form-group__bar"></i>
        </div>
    </div>

    @empty($user)
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" id="password" value="{{ old('password', isset($user) ? $user->password : null) }}">
            <i class="form-group__bar"></i>
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label>Repeat Password</label>
            <input type="password" class="form-control" name="confirm-password" id="confirm-password" value="{{ old('confirm-password', isset($user) ? $user->password : null) }}">
            <i class="form-group__bar"></i>
        </div>
    </div>
    @endempty

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label>Role</label>
            <select class="select2" name="roles">
                <option value="">- Select -</option>
                @foreach ($roles as $key => $role)
                    <option value="{{$key}}"
                        @if ((old('role', isset($user) ? in_array($role, $userRole) : null) == $key))
                            selected
                        @endif
                    >{{$role}}</option>
                @endforeach
            </select>
            <i class="form-group__bar"></i>
        </div>
    </div>

</div>

<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="btn btn-danger btn--icon-text waves-effect pull-2" href="{{ route('users.home') }}"><i class="zmdi zmdi-arrow-back"></i> Back</a>
    </li>
    <li class="nav-item">
        <a class="btn btn-success btn--icon-text waves-effect" id="submit" href="#"><i class="zmdi zmdi-check"></i> Submit</a>
    </li>
</ul>