@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Password</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="/password/{{Auth::user()->id}}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}

                        
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Current Password</label>

                            <div class="col-md-6">
                                <input id="old" type="password" class="form-control" name="old" required>

                                @if ($errors->has('old'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old') }}</strong>
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
                                    Edit
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
