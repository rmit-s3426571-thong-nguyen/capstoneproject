<!--
    This was adapted from https://www.w3schools.com/bootstrap/bootstrap_templates.asp
    this is for educational purposes only
 -->
<div class="jumbotron">
    <div class="container-fluid text-left">
        <div class="banner-header"><a href="{!! URL::to('/') !!}" style="text-decoration: none">Pac Online</a></div>
        <div>@include('search.searchbar')</div>
    </div>
</div>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="{!! URL::to('/') !!}"><img src="{!! asset('images/logo.png') !!}" alt="logo" class="navbar-brand"</image></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="/">All Listings</a></li>
                <li><a href="/foryou">Recommended</a></li>
                <li><a href="/about">About Us</a></li>
                <li><a href="/faq">FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::user())
                    <li><a href=" {{ url('products/create') }}" ><font color="#3097d1"><strong>Sell A Product</strong></font></a></li>
                @endif

                @if (Auth::guest())
                    <li><a href=" {{ route('login') }}" > Login / Register </a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
                            <img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="/mydetails/{{Auth::user()->id}}">
                                    My Details
                                </a>
                            </li>
                            <li>
                                <a href="/userproducts/{{Auth::user()->id}}">
                                    My Listings
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                        </ul>
                    </li>
                @endif
                <li>
                    <a href="{{ route('product.cart') }}"><i class="fa fa-shopping-cart"></i> Cart 
                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>