<!--
    This was adapted from https://www.w3schools.com/bootstrap/bootstrap_templates.asp
    this is for educational purposes only
 -->
<div class="jumbotron">
    <div class="container text-left">
        <img src="{{ URL::to('/image/logo.png') }}" alt="logo" class="navbar-brand" href="/">
        <h2>Pac Online</h2>
        <div class="container text-center">
            <p>Est. 2017</p>
        </div>
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
            <image img src="/image/logo.png" alt="logo" class="nabar-brand" href="/"></image>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="about">About Us</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href=" {{ route('login') }}" ><span class="glyphicon glyphicon-user"></span> Login / Register </a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('mydetails') }}">
                                    My Details
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    My Listings
                                </a>
                            </li>

                            <li>
                                <a href="{{ url('products/create') }}">
                                    Sell a product
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
                    <a href="{{ route('product.cart') }}">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Cart
                        <span class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>