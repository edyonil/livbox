@extends('template')

@section('title')
{{ trans('users.edit.title', array('email' => $user->email)) }}
@stop

@section('content')
<a href="{{ URL::to('users') }}" class="btn btn-lg btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> {{ trans('buttons.back') }}</a>
<hr />

<form class="form-horizontal" role="form" method="post" action="{{ URL::to('users') }}/{{ $user->id }}">
    <div class="form-group">
        <label for="email" class="col-lg-2 control-label">{{ trans('users.email') }}</label>
        <div class="col-lg-10">
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="{{ trans('users.email') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-lg-2 control-label">{{ trans('users.password') }}</label>
        <div class="col-lg-10">
            <input type="password" class="form-control" name="password" placeholder="{{ trans('users.password') }}">
        </div>
    </div>
    <div class="form-group">
        <label for="password_confirmation" class="col-lg-2 control-label">{{ trans('users.password_confirmation') }}</label>
        <div class="col-lg-10">
            <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('users.password_confirmation') }}">
        </div>
    </div>
    @if(Helpers::required(0))
    <div class="form-group">
        <label for="role" class="col-lg-2 control-label">{{ trans('users.role') }}</label>
        <div class="col-lg-10">
            <select name="role" class="form-control">
              <option {{ Helpers::is_active($user->role, 0) }} value="0">{{ Helpers::role_name(0) }}</option>
              <option {{ Helpers::is_active($user->role, 1) }} value="1">{{ Helpers::role_name(1) }}</option>
              <option {{ Helpers::is_active($user->role, 2) }} value="2">{{ Helpers::role_name(2) }}</option>
            </select>
        </div>
    </div>
    @endif
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> {{ trans('buttons.edit') }}</button>
        </div>
    </div>
</form>
@stop