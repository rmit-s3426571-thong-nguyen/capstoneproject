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
              <h5>{{Auth::user()->birth}}</h3>
              <h5>0{{ Auth::user()->phone }}</h3>
              <h5>{{ Auth::user()->address }}, {{ Auth::user()->city }}, {{ Auth::user()->state }} {{ Auth::user()->zip }}</h5>
              @foreach($UserCategoriesLists as $number=>$UserCategoriesList)
                 <h5>Favorite{{++$number}} = {{$UserCategoriesList->category->name}}</h5>
              @endforeach
            </div>
              <br>
              <small>
                <a href="/edit/{{Auth::user()->id}}">Edit Profile</a>
                <br>
                <a href="/editpassword/{{Auth::user()->id}}">Edit Password</a>
              </small>
        </div>
      </div>
    </div>
  </div>
  @endsection