<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Thực phẩm chức năng Ging king</title>
    <link rel="icon" type="image/jpg" href="{{ asset('img/logo.jpg') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm nav-front">
            <div class="container header-top">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form>
                        <i class="fa fa-search text-muted"></i>
                        <input type="" name="" class="header-search" placeholder="Tìm kiếm">
                    </form>
                </div>
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.jpg') }}" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#">
                                <i class="fa fa-user"></i> Tài khoản
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle1" href="{{route('front.show.cart')}}" >
                                <i class="fa fa-shopping-bag"></i> Giỏ hàng
                            </a>

                            <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                
                            </div> -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-5">
            <div class="mt-5 pt-5">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
