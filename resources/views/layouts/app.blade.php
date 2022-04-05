<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ Route::currentRouteName() }}</title>
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>




    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">

                            <input type="search" id="search"
                                class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                                placeholder="NAME or PHONE NUMBER or TRAKING NUMBER" autocomplete="off" style="
                                width:410px
                                " />
                            @csrf
                            <div id="countryList" class="dropdown-menu dropdown-menu-right" aria-labelledby="search">
                            </div>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('activities') }}" class="nav-link">
                                <i class="zmdi zmdi-view-dashboard"></i> <span>Activities</span>
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Orders
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('orders') }}">
                                    Orders
                                </a>
                                <a class="dropdown-item" href="{{ route('orders.inprogress') }}">
                                    In progress
                                </a>
                                <a class="dropdown-item" href="{{ route('orders.checkedOut') }}">
                                    Checked out
                                </a>
                                <a class="dropdown-item" href="{{ route('orders.trashed') }}">
                                    Trashed
                                </a>

                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Users
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('users') }}">
                                    All Users
                                </a>
                                <a class="dropdown-item" href="{{ route('users.trashed') }}">
                                    Trash
                                </a>

                            </div>
                        </li>


                        <li class="nav-item">
                            <a href="{{ route('users') }}" class="nav-link">
                                <i class="zmdi zmdi-view-dashboard"></i> <span>Users</span>
                            </a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a id="localeDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <img src="/img/flags/{{ App::currentLocale() }}.svg" width="20px"
                                    alt="{{ __(App::currentLocale()) }}">
                                {{ __(App::currentLocale()) }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="localeDropdown">
                                <a class="dropdown-item" href="{{ route('locale', 'en') }}" onclick="">
                                    <img src="/img/flags/en.svg" width="20px" alt="{{ __('en') }}">
                                    {{ __('en') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('locale', 'ar') }}" onclick="">
                                    <img src="/img/flags/ar.svg" width="20px" alt="{{ __('ar') }}">
                                    {{ __('ar') }}
                                </a>
                                <a class="dropdown-item" href="{{ route('locale', 'fr') }}" onclick="">
                                    <img src="/img/flags/fr.svg" width="20px" alt="{{ __('fr') }}">
                                    {{ __('fr') }}
                                </a>
                            </div>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.password') }}">
                                        {{ __('Change password') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>



        <main class="py-4">
            @yield('content')
        </main>
        <footer class="footer">
            <div class="container">
                <div class="text-center">Copyright © {{ now()->year }} {{ config('app.name', 'Laravel') }}
                </div>
            </div>
        </footer>
    </div>

</body>

</html>

<script>
    $(document).ready(function() {

        $("#search").keyup(function() {
            var search_value = $(this).val();
            if (search_value != "") {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ route('autocomplete') }}",
                    method: "POST",
                    data: {
                        search_value: search_value,
                        _token: _token,
                    },
                    success: function(data) {
                        $("#countryList").fadeIn();
                        $("#countryList").html(data);
                    },
                });
            } else {
                $("#countryList").fadeOut();
            }
        });

    });
</script>
