<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>CookingBook B.V.</title>

    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</head>
<body class="d-flex flex-column">

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-custom-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <a class="navbar-brand" href="{{ URL::to('') }}">Home</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::path() === 'recipes' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::to('recipes') }}">Recepten</a>
                </li>
                <li class="nav-item {{ Request::path() === 'news-items' ? 'active' : '' }}">
                    <a class="nav-link" href="{{ URL::to('news-items') }}">Nieuwsberichten</a>
                </li>
            </ul>
            <a class="navbar-text" href="{{ URL::to('admin/login') }}">Inloggen</a>
        </div>
    </nav>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                @yield('content')
            </div>
        </div>
    </div>
</main>

<footer class="footer mt-auto py-3">
    <div class="container text-center">
        <span class="text-muted">CookingBook B.V. © {{ date('Y') }}</span>
    </div>
</footer>

<script src="{{ URL::to('js/app.js') }}" charset="utf-8"></script>
<link rel="stylesheet" href="{{ URL::to('fonts/fontawesome/css/all.min.css') }}">

</body>
</html>
