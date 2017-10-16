@extends('layouts.app')

@section('title')
    Update Details
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Details</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/users/{{Auth::user()->id}}">
                        {{ method_field('PUT') }}
                        
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required>

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
                                    value="{{Auth::user()->birth}}" required autofocus>
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
                                    value="0{{Auth::user()->phone}}" required autofocus>
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
                                <input id="address" type="text" class="form-control" name="address" value="{{Auth::user()->address}}" required autofocus>

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
                                <input id="city" type="text" class="form-control" name="city" value="{{Auth::user()->city}}" required autofocus>

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
                                <input id="zip" type="text" class="form-control" name="zip" value="{{Auth::user()->zip}}" required autofocus>

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ZIP') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                                <div class="form-group{{ ($errors->has('category_1') || $errors->has('category_2') || $errors->has('category_3')) ? ' has-error' : '' }}">
                                <label for="category" class="col-md-4 control-label"></label>

                                <div class="col-md-6">
                                    <label>Rate your three favourite categories from highest to lowest. </br>We will do our best make your shopping experience easier.</label>
                                    <label><strong>Please select from the following:</strong></label>
                                </div>

                                <label for="category" class="col-md-4 control-label">Favourite 1 </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="category_1">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="category" class="col-md-4 control-label">Favourite 2 </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="category_2">
                                        @foreach($categories as $category)
                                            <option value="{{ $UserCategoriesList->category->id }}"> {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <label for="category" class="col-md-4 control-label">Favourite 3 </label>
                                <div class="col-md-6">
                                    <select class="form-control" name="category_3">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_3'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_3') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                        <div class="center gap-bottom">
                            <label>Change Avatar</label>
                            
                            <input type="file" name='avatar' value="{{ old('avatar') }}">
                        </div>

                        <div class="form-group text-center">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
