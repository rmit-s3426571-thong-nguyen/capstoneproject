@extends ('layouts.master')


@section('title')
    My Details
@endsection

<style type="text/css">
  .userdetails-img{
    max-width: 150px;
    border: 5px solid #fff;
    border-radius: 100%;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.3);  
  }
</style>
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">

                    <div class="gap-bottom">
                        <img class="userdetails-img" src="/uploads/avatars/{{Auth::user()->avatar}}">
                        <h1>{{Auth::user()->name}}</h1>
                        <h5>{{Auth::user()->email}}</h5>
                        <h5>{{Auth::user()->birth}}</h5>
                        <h5>0{{ Auth::user()->phone }}</h5>
                        <h5>{{ Auth::user()->address }}, {{ Auth::user()->city }}, {{ Auth::user()->state }} {{ Auth::user()->zip }}</h5>

                    </div>
                    <div>
                        <label>Your interests:</label>
                        @foreach (Auth::user()->categories as $userCat)
                            <h5>{{ \App\Category::find($userCat['cat_id'])->name }}</h5>
                        @endforeach
                    </div>
                    <hr>
                    <div>
                        <small>
                            <a href="/edit/{{Auth::user()->id}}">Edit Profile</a>
                            <br>
                            <a href="/editpassword/{{Auth::user()->id}}">Edit Password</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @endsection