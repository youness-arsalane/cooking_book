<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>CookingBook B.V. - @yield('title')</title>

    <link rel="stylesheet" href="{{ URL::to('css/app.css') }}">
</head>
<body class="d-flex flex-column">

<main role="main" class="flex-shrink-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="mb-3 text-center">CookingBook B.V.</h2>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{ URL::to('admin/login') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" title="Gebruikersnaam" placeholder="Gebruikersnaam">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" title="Wachtwoord" placeholder="Wachtwoord">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark w-100">Inloggen</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

</body>
</html>
