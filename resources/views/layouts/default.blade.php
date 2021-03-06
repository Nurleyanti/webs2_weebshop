<!DOCTYPE html>
<html lang="en">



<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title')</title>

<!-- Bootstrap settings -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<!-- Scripts -->
<script>
    window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
</script>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href={{asset('css/bootstrap.min.css')}} rel="stylesheet">
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">--}}

    <!-- Custom CSS -->
    <link href={{asset('css/shop-homepage.css')}} rel="stylesheet">
    <link href={{asset('css/app.css')}} rel="stylesheet">
    {{--<link href={{asset('css/cmsproduct.css')}} rel="stylesheet">--}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>

<body>


<!-- Navigation -->
<nav class="navbar fixed-top navbar-toggleable-md navbar-inverse bg-inverse">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <a class="navbar-brand" href="/">Weebshop</a>
        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="navbar-nav ml-auto" class="dropdown-menu" role="menu">
                <li class="nav-item ">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>

                {{--@include('layouts.menu')--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('shoppingCart')}}"><i class="fa fa-shopping-cart"></i> Shopping Cart
                        <span class="badge badge-primary badge-pill">{{Session::has('cart') ? Session::get('cart')->totalQty : ''}}</span>
                    </a>
                </li>
                @if (Auth::guest())
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a  class="nav-link " class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user"></i>{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            @if(Auth::check())
                                @if (Auth::user()->isAdmin())
                                    <li>
                                        <a href="{{route('cms.products')}}">
                                            CMS products
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('cms.categories')}}">
                                            CMS categories
                                        </a>
                                    </li>
                                            @endif
                                            @endif

                            <li>
                                <a href="{{route('auth.profile')}}">
                                    Profile
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
            </ul>
        </div>
    </div>
</nav>


@yield('content')



<!-- Footer -->
<footer class="py-5 bg-inverse">
    <div class="container">
        <p class="m-0 text-center text-white">&copy; Copyright 2018. Powered by Weebshop. ALL RIGHTS RESERVED</p>
    </div>
    <!-- /.container -->
</footer>

<!-- jQuery Version 3.1.1 -->
<script src="js/jquery.js"></script>

<!-- Tether -->
<script src="js/tether.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>