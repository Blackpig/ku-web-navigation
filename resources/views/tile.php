<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StaffSpace</title>
     <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/assets/css/app.css">
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
    <style>
    /* Elements & general class*/
.ms-tile {
    width: 290px;
    height:140px;
    background-color: #fff;
    border: 1px solid #fff;
}

.ms-tile .tile-body{
    width: 100%;
    height: 109px;
}

.ms-tile .tile-front{
    text-align: left;
}

.ms-tile .tile-front .tile-content{
    vertical-align: initial;
    padding-top: 15px;
}

.ms-tile .title {
    text-align: center;
    width:82px;
    float: left;
} 

.ms-tile .info {
    width:192px;
    float: left;
} 

.ms-tile .info .details{
    margin-top: 8px;
} 

.ms-tile .info .details{
    font-size: 9pt;
}

.ms-tile .tile-icons .fa-lg{
    line-height: 1.5em;
    vertical-align: 0;
}
</style>
</head>
<body>
    <header class="fixed">
        <nav class="top-bar" data-topbar role="navigation">
            <ul class="title-area">
                <li class="name">
                    <h1><a href="/staffspace" class="current">StaffSpace</a></h1>
                </li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="has-dropdown">
                        <a href="#">My Favourites</a>
                        <ul class="dropdown">
                            <li><a href="/staffspace/lrc-print-resources">LRC Print Resources</a></li>
                            <li><a href="/my-kingston/my-studies">My Studies</a></li>
                        </ul>

                    </li>
                    <li class="has-dropdown">
                        <a href="#">Switch View</a>
                        <ul class="dropdown">
                            <li><a href="/staffspace">StaffSpace - Staff View</a></li>
                            <li><a href="/my-kingston">My Kingston - Student View</a></li>
                        </ul>
                    </li>
                </ul>

            </section>
        </nav>
    </header>


    <div class="container">
        <div class="wall">

            <div class="ms-tile" >
                <div class="red">
                    <div class="tile-body row" >
                        <div class="tile-front">
                            <div class="tile-content" >
                                <div class="title">
                                     <a ng-href="my-tickets"><i class="fa fa-tags fa-3x"></i></a>
                                </div>
                                <div class="info">
                                    <a ng-href="my-tickets">My Tickets</a>
                                    <div class="details">
                                        <p>Open Tickets: 14</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tile-back">
                            <div class="tile-content">
                                <p>On The back</p>
                            </div>
                        </div>
                    </div>
                    <div class="tile-icons">
                        <ul>
                            <li><a href="#" ng-click="ctrl.toggleInfo($index)"><i class="fa fa-info fa-lg"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
 <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/assets/vendor/angular/angular.js"></script>
    <script src="/assets/vendor/angular-ui/angular-ui-router.min.js"></script>
    <script src="/assets/vendor/pineconellc/mm-foundation-tpls-0.6.0.js"></script>
    <script src="/assets/vendor/metafizzy/packery.pkgd.min.js"></script>
    <script src="/assets/vendor/desandro/draggabilly.pkgd.min.js"></script>
    <script src="/assets/js/app-ui.js"></script>
</html>