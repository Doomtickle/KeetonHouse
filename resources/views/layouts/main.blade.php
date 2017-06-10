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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
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
        <aside class="column is-2 aside hero is-fullheight is-dark is-hidden-mobile">
            <div>
                <div class="main">
                    <div class="columns">
                        <div class="column is-half">
                            <p class="subtitle is-large">{{ \Auth::user()->facility }}</p>
                        </div>
                        <div class="column is-half" style="margin-top:-10px;">
                            <div class="has-text-centered">
                                <form action="/logout" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="button is-warning is-outlined">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="/home" :class="{'active': onPage('/home')}" class="item"><span class="icon"><i
                                    class="fa fa-tachometer"></i></span><span class="name">Dashboard</span></a>
                    <a href="{{ route('resident.index') }}" class="item"><span class="icon"><i
                                    class="fa fa-user"></i></span><span
                                class="name">Residents</span></a>
                    <a href="/resident_reports" class="item"><span class="icon"><i
                                    class="fa fa-file-text"></i></span><span
                                class="small-name">Resident&nbsp;Reports</span></a>
                    <a href="/transaction_reports" class="item"><span class="icon"><i
                                    class="fa fa-file-text"></i></span><span
                                class="small-name">Transaction&nbsp;Reports</span></a>
                    <a href="/facility_report/select" class="item"><span class="icon"><i
                                    class="fa fa-file-text"></i></span><span
                                class="small-name">Facility&nbsp;Reports</span></a>
                </div>
            </div>
        </aside>
        <div class="column is-10 admin-panel">
            <section class="hero is-info is-bold is-small">
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
                    Tracking Solutions by <strong>On Point</strong>. The website content
                    is licensed <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/">CC ANS 4.0</a>.
                </p>
            </div>
        </div>
    </footer>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts.footer')
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-100555024-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>