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
        <!-- Piwik -->
        <script type="text/javascript">
          var _paq = _paq || [];
          _paq.push(['trackPageView']);
          _paq.push(['enableLinkTracking']);
          (function() {
            var u="//kuplayer.kingston.ac.uk/analytics/";
            _paq.push(['setTrackerUrl', u+'piwik.php']);
            _paq.push(['setSiteId', 1]);
            var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
            g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
          })();
        </script>
        <noscript><p><img src="//kuplayer.kingston.ac.uk/analytics/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
        <!-- End Piwik Code -->   
    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/assets/vendor/angular/angular.js"></script>
    <script src="/assets/vendor/angular-ui/angular-ui-router.min.js"></script>
    <script src="/assets/vendor/pineconellc/mm-foundation-tpls-0.6.0.js"></script>
    <script src="/assets/vendor/metafizzy/packery.pkgd.min.js"></script>
    <script src="/assets/js/app-ui.js"></script>
</html>
