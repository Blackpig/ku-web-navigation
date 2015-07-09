<!doctype html>
<html class="no-js" lang="en" ng-app="kuwnApp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge"></meta>
        <title>KU Web Nav</title>
        <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/app.css">
        <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="/assets/css/app-ie.css" />
        <![endif]-->
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
        <base href="/">
    </head>
    <body>
        
        <ui-view name="content"></ui-view>
       

    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/assets/vendor/angular/angular.js"></script>
    <script src="/assets/vendor/angular-ui/angular-ui-router.min.js"></script>
    <script src="/assets/vendor/pineconellc/mm-foundation-tpls-0.6.0.js"></script>
    <script src="/assets/vendor/metafizzy/packery.pkgd.min.js"></script>
    <script src="/assets/js/app-ui.js"></script>
</html>
