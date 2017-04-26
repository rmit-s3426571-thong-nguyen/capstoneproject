<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="none" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="admin login">
    <title>Admin - {{ Voyager::setting("title") }}</title>
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ voyager_asset('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ voyager_asset('css/login.css') }}">
    <style>
        body {
            {{--This background is from http://keirlyonfraser-blog.tumblr.com/post/4053694672 (Only for education purpose) --}}
        	background-image: url("http://68.media.tumblr.com/tumblr_lijemcEUCE1qdzruho1_500.gif");
        	height: 100%;
        	width: 100%;
            {{--
            	background-image:url('{{ Voyager::image( Voyager::setting("admin_bg_image"), config('voyager.assets_path') . "/images/bg.jpg" ) }}'); 
            	--}}
        }
        .login-sidebar:after {
            background: linear-gradient(-135deg, {{config('voyager.login.gradient_a','#ffffff')}}, {{config('voyager.login.gradient_b','#ffffff')}});
            background: -webkit-linear-gradient(-135deg, {{config('voyager.login.gradient_a','#ffffff')}}, {{config('voyager.login.gradient_b','#ffffff')}});
        }
        .login-button, .bar:before, .bar:after{
            background:{{ config('voyager.primary_color','#22A7F0') }};
        }

    </style>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<!-- Designed with ♥ by Frondor -->
<div class="container-fluid">
    <div class="row">
        <div class="animated"></div>
        <div class="hidden-xs col-sm-8 col-md-9">
            <div class="clearfix">
                <div class="col-sm-12 col-md-10 col-md-offset-2">
               		
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-4 col-md-3 login-sidebar animated fadeInRightBig">

            <div class="login-container animated fadeInRightBig">

                <h2>Sign In Below:</h2>

                <form action="{{ route('voyager.login') }}" method="POST">
                {{ csrf_field() }}
                <div class="group">      
                  <input type="text" name="email" value="{{ old('email') }}" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label><i class="glyphicon glyphicon-user"></i><span class="span-input"> E-mail</span></label>
                </div>

                <div class="group">      
                  <input type="password" name="password" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label><i class="glyphicon glyphicon-lock"></i><span class="span-input"> Password</span></label>
                </div>

                <button type="submit" class="btn btn-block login-button">
                    <span class="signingin hidden"><span class="glyphicon glyphicon-refresh"></span> Loggin in...</span>
                    <span class="signin">Login</span>
                </button>
               
              </form>

              @if(!$errors->isEmpty())
              <div class="alert alert-black">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                    @endforeach                
                </ul>
              </div>            
              @endif

            </div> <!-- .login-container -->
            
        </div> <!-- .login-sidebar -->
    </div> <!-- .row -->
</div> <!-- .container-fluid -->
<script>
    var btn = document.querySelector('button[type="submit"]');
    var form = document.forms[0];
    btn.addEventListener('click', function(ev){
        if (form.checkValidity()) {
            btn.querySelector('.signingin').className = 'signingin';
            btn.querySelector('.signin').className = 'signin hidden';
        } else {
            ev.preventDefault();
        }
    });
</script>
</body>
</html>
