<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Portal Papua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('template/css/media_query.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PV1GOfQNHSOD2xbE+QkPXCAF1NEevOEH3S10sibVCOQVnN" crossorigin="anonymous">
    <link href="{{ asset('template/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="{{ asset('template/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/css/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/css/style_1.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('template/js/modernizr-3.5.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid bg-faded ">
        <div class="container">
            <nav class="navbar navbar-toggleable-md navbar-light">
                <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="images/logo.png" alt="img" class="mobile_logo_width" /></a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/about">About <span class="sr-only">(current)</span></a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link bg-primary" href="/login"> <span class="text-white">Login</span> <span class="sr-only"> (current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-primary" href="/register"> <span class="text-white">Register</span> <span class="sr-only"> (current)</span></a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category <span class="sr-only">(current)</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="/categories">Categories Appear</a>
                                <a class="dropdown-item" href="/categories/create">Add Category</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News <span class="sr-only"> (current)</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink_1">
                                <a class="dropdown-item" href="/news">News Appear</a>
                                <a class="dropdown-item" href="/news/create">Add News</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-4 paddding">
        @yield('content')
    </div>
    <footer class="footer mt-auto fh5co_footer_right_reserved">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 py-4 Reserved">
                    Copyright 2024, All rights reserved. Design by <a href="#" title="Free HTML5 Bootstrap templates">Teknologi Rekayasa Internet</a>.
                </div>
            </div>
        </div>
    </footer>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>
</body>
</html>