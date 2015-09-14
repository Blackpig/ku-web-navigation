<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title or 'Navigator' }}</title>
        <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/app.css">
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
    </head>
    <body>
        <header class="fixed">
            @yield('navbar')
        </header>
        

        <div class="container">
            @yield('content')
        </div>

    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/assets/vendor/foundation/js/vendor/fastclick.js"></script>
    <script src="/assets/vendor/foundation/js/foundation.min.js"></script>
    <script src="/assets/vendor/foundation/js/foundation/foundation.topbar.js"></script>    
    <script src="/assets/vendor/foundation/js/foundation/foundation.tooltip.js"></script>
</html>