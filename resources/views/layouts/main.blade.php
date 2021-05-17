<!DOCTYPE html>
<html>
    <head>
        <title>@yield('page_name') / Speed Lancer</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Speed Lancer</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a href="/" class="nav-link">{{__('site_names.home')}}</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a href="/profile" class="nav-link">{{__('site_names.profile')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="/logout" class="nav-link">{{__('site_names.logout')}}</a>
                        </li>
                        @endauth
                        @guest
                        <li class="nav-item">
                            <a href="/register" class="nav-link">{{__('site_names.registration')}}</a>
                        </li>
                        <li class="nav-item">
                            <a href="/login" class="nav-link">{{__('site_names.authorize')}}</a>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
