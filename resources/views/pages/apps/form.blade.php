<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label>Client Id</label>
            <input type="text" class="form-control" name="client_id" id="client_id" value="{{ old('client_id', isset($druid_app) ? $druid_app->client_id : null) }}" @isset($druid_app) disabled @endisset>
            <i class="form-group__bar"></i>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label>Secret</label>
            <input type="text" class="form-control" name="secret" id="secret" value="{{ old('secret', isset($druid_app) ? $druid_app->secret : null) }}">
            <i class="form-group__bar"></i>
        </div>
    </div>

    <div class="col-xs-12 col-md-6">
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name', isset($druid_app) ? $druid_app->name : null) }}">
            <i class="form-group__bar"></i>
        </div>
    </div>

</div>

<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="btn btn-danger btn--icon-text waves-effect pull-2" href="{{ route('apps.home') }}"><i class="zmdi zmdi-arrow-back"></i> Back</a>
    </li>
    <li class="nav-item">
        <a class="btn btn-success btn--icon-text waves-effect" id="submit" href="#"><i class="zmdi zmdi-check"></i> Submit</a>
    </li>
</ul>
