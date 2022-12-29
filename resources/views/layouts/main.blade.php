<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{ csrf_token() }}" />

    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <!-- Bootstrap -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('stylesheets')
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-uppercase" href="{{ url('/') }}">
                <strong>{{ __('Contact') }}</strong>{{ __(' App') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggler"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="navbar-toggler">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item {{ request()->path() == 'dashboard' ? 'active' : '' }}">
                            <a href="{{ route('home') }}" class="nav-link">{{ __('Dashboard') }}</a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == 'companies' ? 'active' : '' }}">
                            <a href="{{ route('companies.index') }}" class="nav-link">{{ __('Companies') }}</a>
                        </li>
                        <li class="nav-item {{ request()->segment(1) == 'contacts' ? 'active' : '' }}">
                            <a href="{{ route('contacts.index') }}" class="nav-link">{{ __('Contacts') }}</a>
                        </li>
                    </ul>
                @endauth
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item mr-2">
                            <a href="{{ route('login') }}" class="btn btn-outline-secondary">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-outline-primary">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('John Doe') }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="profile.html">{{ __('Settings') }}</a>
                                <a class="dropdown-item" href="#">{{ __('Logout') }}</a>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- content -->
    <main class="py-5">
        @yield('content')
    </main>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    @yield('scripts')
</body>

</html>