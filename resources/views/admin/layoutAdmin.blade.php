<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titleAdmin')</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>
</head>
<body>
    <section id="adminPage">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 sideBar container text-center pt-5">
                    <h1>Vítaj {{auth()->user()->name . ' ' . auth()->user()->surname}}</h1>
                    <h3>{{auth()->user()->role->name}}</h3>
                    <hr>
                    <nav class="navbar navbarMenu navbar-dark p-0 flex-column">
                        <a class="nav-link" href="/admin/pizzas">Zoznam pizz</a>
                        @unless(auth()->user()->role->name == 'employee')
                        <a class="nav-link" href="/admin/users">Zoznam užívateľov</a>
                        @endunless
                    </nav>
                    <hr>
                    <div class="col-xl col-6 text-center">
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="btn btn-danger bg-transparent">Odhlásiť sa</button>
                        </form>
                    </div>
                </div>
                @yield('contentAdmin')
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/js/modal.js') }}"></script></body>
</html>

