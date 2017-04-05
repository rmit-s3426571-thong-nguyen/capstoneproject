@extends('layouts.app')

@section('content')
<div class="container-float">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/users">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('birth') ? ' has-error' : '' }}">
                            <label for="birth" class="col-md-4 control-label" placeholder="dd/mm/yyyy">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="birth" type="birth" class="form-control" name="birth" placeholder="dd/mm/yyyy"
                                    value="{{ old('birth') }}" required autofocus>
                                @if ($errors->has('birth'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Phone') ? ' has-error' : '' }}">
                            <label for="Phone" class="col-md-4 control-label">Phone number</label>

                            <div class="col-md-6">
                                <input id="Phone" type="text" class="form-control" name="Phone" placeholder="0411122233"
                                    value="{{ old('Phone') }}" required autofocus>
                                @if ($errors->has('Phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Address') ? ' has-error' : '' }}">
                            <label for="Address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="Address" type="text" class="form-control" name="Address" value="{{ old('Address') }}" required autofocus>

                                @if ($errors->has('Address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('City') ? ' has-error' : '' }}">
                            <label for="City" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="City" type="text" class="form-control" name="City" value="{{ old('City') }}" required autofocus>

                                @if ($errors->has('City'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('City') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('State') ? ' has-error' : '' }}">
                            <label for="State" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                <input id="State" type="text" class="form-control" name="State" value="{{ old('State') }}" required autofocus>

                                @if ($errors->has('State'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('State') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ZIP') ? ' has-error' : '' }}">
                            <label for="ZIP" class="col-md-4 control-label">ZIP</label>

                            <div class="col-md-6">
                                <input id="ZIP" type="text" class="form-control" name="ZIP" value="{{ old('ZIP') }}" required autofocus>

                                @if ($errors->has('ZIP'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ZIP') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                <label> Password must contain combination of:<br>
                                - Uppercase characters or Lowercase characters<br>
                                - Base 10 digits (0-9)<br>
                                - Non-alphanumeric (eg. !,@,$,#,%,^,&,* or ?) <br>
                                - Min 6 Characters</label>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
