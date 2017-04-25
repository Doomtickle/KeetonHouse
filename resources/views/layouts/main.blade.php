<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
    'csrfToken' => csrf_token(),
    ]) !!};
    </script>
</head>
<body>
<div id="root">
    <div class="columns">
        <aside class="column is-2 aside hero is-fullheight is-bold is-dark is-hidden-mobile">
            <div>
                <div class="main">
                    <a href="/home" :class="{'active': onPage('/home')}" class="item"><span class="icon"><i
                                    class="fa fa-tachometer"></i></span><span class="name">Dashboard</span></a>
                    <a href="{{ route('resident.create') }}" class="item"><span class="icon"><i class="fa fa-user"></i></span><span
                                class="name">Residents</span></a>
                    <a href="#" class="item"><span class="icon"><i class="fa fa-file-text"></i></span><span
                                class="name">Reports</span></a>
                </div>
            </div>
        </aside>
        <div class="column is-10 admin-panel">
            <section class="hero is-light is-small">
                <!-- Hero content: will be in the middle -->
                <div class="hero-body">
                    <div class="container">
                        <h1 class="title">
                            @yield('title')
                        </h1>
                    </div>
                </div>
            </section>
            @yield('content')
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="has-text-centered">
                <p>
                    <strong>Prototype</strong> by Daron Adkins. The source code is licensed according to
                    <a href="http://opensource.org/licenses/mit-license.php">MIT</a> guidelines. The website content
                    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC ANS 4.0</a>.
                </p>
                <p>
                    <a class="icon" href="https://github.com/doomtickle" target="_blank">
                        <i class="fa fa-github"></i>
                    </a>
                </p>
            </div>
        </div>
    </footer>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts.footer')
</body>
</html>