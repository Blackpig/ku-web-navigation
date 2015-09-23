<!doctype html>
<html class="no-js" lang="en" ng-app="kuwnApp">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta http-equiv="CACHE-CONTROL" content="NO-CACHE">
        <meta http-equiv="EXPIRES" content="Sat, 31 Jan 2015 11:12:01 GMT"> 
        <title>KU Navigator</title>
        <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/app.css">
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
        <base href="/">
    </head>
    <body>
        
        <div ui-view name="content" autoscroll="false"></div>
        <ngp-piwik ngp-set-js-url="/analytis/piwik.js" ngp-set-tracker-url="/analytis/piwik.php" ngp-set-site-id="<id>"> </ngp-piwik>
    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/assets/vendor/angular/angular.js"></script>
    <script src="/assets/vendor/angular-ui/angular-ui-router.min.js"></script>
    <script src="/assets/vendor/mike-spainhower/angular-piwik.js"></script>
    <script src="/assets/vendor/pineconellc/mm-foundation-tpls-0.6.0.js"></script>
    <script src="/assets/vendor/metafizzy/packery.pkgd.min.js"></script>
    <script src="/assets/js/app-ui.js"></script>
</html>
