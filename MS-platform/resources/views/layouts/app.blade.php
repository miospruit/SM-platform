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


                  <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                  </a>
                </div>

                <div id="navMenu" class="navbar-menu">
                  <div class="navbar-start">
                    {{-- <a class="navbar-item" href="/home">
                      Home
                    </a> --}}

                    <hr class="navbar-divider">

                    <div class="navbar-item has-dropdown is-hoverable">
                      <a class="navbar-link">
                        More
                      </a>

                      <div class="navbar-dropdown">
                        <a class="navbar-item" href="/about">
                          About
                        </a>
                        <a class="navbar-item" href="/contact">
                          Contact
                        </a>
                      </div>
                    </div>
                  </div>

                  <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                        @guest
                        @if (Route::has('register'))
                            <strong>
                                <a class="button is-primary" href="{{ route('register') }}">
                                    {{ __('Register') }}
                                    {{-- <strong>Sign up</strong> --}}
                                </a>
                            </strong>
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
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
    </div>
</body>
</html>
