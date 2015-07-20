<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Layout :: KU Web Nav</title>
        <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/app.css">
        <style>
            #save-layout {
                padding: 0.4rem 0.5rem;
            }

            .no-drag {
                cursor: not-allowed;
            }

            footer {
                background: #333;
                color: #fff;
                height: 35px;
                text-align: center;
                vertical-align: middle;
            }

            footer .row {
                margin-top: 50px;                
            }

            footer p {
                font-size: 8pt;
                line-height:12pt;
            }

        </style>
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
        <base href="/">
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
    <script src="/assets/vendor/foundation/foundation.reveal.js"></script>
    <script src="/assets/vendor/metafizzy/packery.pkgd.min.js"></script>
    <script src="/assets/vendor/desandro/draggabilly.pkgd.min.js"></script>
    <script src="/assets/js/layout.js"></script>
</html>