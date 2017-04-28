@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
<div class="container-float">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
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

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="0411122233"
                                    value="{{ old('phone') }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">
                                 <select name="state" required autofocus>
                                    <option value="new south wales">NSW</option>
                                    <option value="queensland">QLD</option>
                                    <option value="victoria" selected>VIC</option>
                                    <option value="tasmania">TAS</option>
                                    <option value="western australia">WA</option>
                                    <option value="south australia">SA</option>
                                  </select>

                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                            <label for="zip" class="col-md-4 control-label">ZIP</label>

                            <div class="col-md-6">
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ old('zip') }}" required autofocus>

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('first_interest') ? ' has-error' : '' }}">
                            <label for="first_interest" class="col-md-4 control-label">First Interest</label>

                            <div class="col-md-6">
                                <input id="first_interest" type="text" class="form-control" name="first_interest" value="{{ old('first_interest') }}" required autofocus>

                                @if ($errors->has('first_interest'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_interest') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                             <div class="form-group{{ $errors->has('second_interest') ? ' has-error' : '' }}">
                            <label for="second_interest" class="col-md-4 control-label">Second Interest</label>

                            <div class="col-md-6">
                                <input id="second_interest" type="text" class="form-control" name="second_interest" value="{{ old('second_interest') }}" required autofocus>

                                @if ($errors->has('second_interest'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('second_interest') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                             <div class="form-group{{ $errors->has('third_interest') ? ' has-error' : '' }}">
                            <label for="first_interest" class="col-md-4 control-label">Third Interest</label>

                            <div class="col-md-6">
                                <input id="third_interest" type="text" class="form-control" name="third_interest" value="{{ old('third_interest') }}" required autofocus>

                                @if ($errors->has('third_interest'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('third_interest') }}</strong>
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
