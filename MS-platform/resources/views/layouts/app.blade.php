<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/e9839cb680.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        {{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div id="app">

            <nav class="navbar" role="navigation" aria-label="main navigation">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>


                    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                        data-target="navMenu">
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                        <span aria-hidden="true"></span>
                    </a>
                </div>

                <div id="navMenu" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="/photos/create">
                            Create new post
                        </a>
                        <a class="navbar-item" href="/photos">
                            Wall
                        </a>

                        <hr class="navbar-divider">

                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">
                                More
                            </a>
                        </div>
                    </div>

                    <div class="navbar-end">
                        <div class="navbar-item">
                            <form action="{{route('photo.search')}}" method="get">
                                @csrf
                                <div class="field has-addons">
                                    <div class="control">
                                        <input class="input" name="search" type="text" placeholder="Search" required>
                                    </div>
                                    <div class="control">
                                        <button type="submit" class="button is-primary">
                                            Search
                                        </button>
                                    </div>
                                </div>
                        </div>
                        </form>
                        <div class="navbar-item">
                            <div class="buttons">
                                @guest
                                @if (Route::has('register'))
                                <a class="button is-primary" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                    {{-- <strong>Sign up</strong> --}}
                                </a>
                                @endif
                                <a class="button is-light" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                    {{-- Log in --}}
                                </a>
                            </div>
                            @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                        {{ __('logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="{{ route('users.edit', $currentUser) }}" class="navbar-item">Edit
                                        profile</a>
                                </div>

                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
            <footer class="footer">
                <div class="content has-text-centered">
                    <p>
                        <strong>Social media</strong> by <a href="#">Mio Spruit</a>. The source code is
                        licensed
                        <a href="http://opensource.org/licenses/mit-license.php">MIT</a>. The website content
                        is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC BY NC SA 4.0</a>.
                    </p>
                </div>
            </footer>
        </div>
    </body>

</html>
