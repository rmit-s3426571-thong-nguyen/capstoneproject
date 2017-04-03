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
            <img class="userdetails-img" src="http://4.bp.blogspot.com/-EswNjNJ2PCE/Te8OnAY7haI/AAAAAAAABdk/VpY48SVsVO0/s1600/pedo-bear-is-sad.jpeg">

            <h1>{{Auth::user()->name}}</h1>
            <h5>{{Auth::user()->email}}</h5>
            <h5>{{Auth::user()->birth}}</h3>

        </div>
      </div>
    </div>
  </div>
  @endsection