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
        <div class="column admin-panel">
            <section class="hero is-info is-bold is-small">
                <!-- Hero content: will be in the middle -->
                <div class="hero-body">
                    <h1 class="title" style="padding: 10px 40px;">
                        @yield('title')
                    </h1>
                    <div style="padding: 10px 40px;">
                        @yield('downloadButton')
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