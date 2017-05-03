 @inject('flash', '\App\Helpers\FlashMessage')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Client Area | {{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="has-top-navbar">
    <div id="app">
        {{ $flash->displayBulma() }}

        <nav class="nav container">
            <div class="nav-left">
                <a class="nav-item nav-brand" href="{{ route('home') }}">
                    Client Area
                </a>
            </div>
            
            <!-- Desktop menu -->
            <div class="nav-right nav-menu">
                @if (Auth::guest())
                    <a class="nav-item" href="{{ route('login') }}">Login</a>
                    <a class="nav-item" href="{{ route('register') }}">Register</a>
                @else
                <a class="nav-item" href="{{ route('tickets.index') }}">My tickets</a>

                
                <a class="nav-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                @endif
            </div>

            <!-- Mobile menu -->
            <div class="nav-toggle">
                <dropdown-menu>
                    <template slot="button" class="nav-toggle is-dark">
                        <span class="icon">
                            <i class="fa fa-bars"></i>
                        </span>
                    </template>

                    <template slot="menu">
                        <ul class="menu-list" style="background-color: #242424">
                            <li>
                                <a href="{{ route('tickets.index') }}">My tickets</a>
                            </li>
                            <li>
                                <a class="nav-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </template>
                </dropdown-menu>
            </div>
        </nav>

        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    @yield('inline-script')
    {{-- <script src="https://cdn.polyfill.io/v2/polyfill.js"></script> --}}
    <script src="/js/app.js"></script>
</body>
</html>
