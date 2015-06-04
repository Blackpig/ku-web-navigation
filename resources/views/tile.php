<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StaffSpace</title>
    <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
    <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="/assets/css/tile.css"> -->
    <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
    <style>
    /* Elements & general class*/
body {
    background: #d9e2ea;
    box-sizing: content-box;
    font-family: sans-serif;
}

p {
    font-size: 12pt;
}

/* Page Layout */
.container {
    overflow: visible;
    width: 100%;
    min-width: 100%;
    max-width: 100%;
    margin: 65px auto;
}

.wall {
    padding-left: 20px;
    padding-right: 20px;
    display: block;
    margin: 0px auto;
    width: auto;
    max-width: 1200px;
    min-width: 755px;
}

/* Tile layout */
.tile {
    border: 2px solid #000;
   /* border-radius: 3px;*/
    margin: 0 5px 10px;
    width: auto;
    height: 130px;
    position: relative;
    box-sizing: content-box;
    perspective: 1000px;
    padding: 3px;
    background: #fff;
}

.service-group, .service-group .tile-body, .service-group .tile-content {
    width: 270px;
}

.endpoint, .endpoint .tile-body, .endpoint .tile-content {
    width: 130px;
}


.tile-icons {
    height: 38px;
    background: #ccc;
    margin-top: 2px;
}

.tile-icons ul {
    list-style-type: none;
    text-align: center;
    line-height: 2.5em;
    margin: 0;
}

.tile-icons ul li{
    display: inline;
    margin-right: 2px;
}

.tile-icons ul li a{
    color: rgba(255, 255, 255, 1);
}

.tile-icons ul li a:hover, .tile-icons ul li a:focus{
    color: rgba(255, 255, 255, .5);
}

.tile-icons ul li:last-of-type{
    display: inline;
    margin-right: 0;
}

.tile-body {
    height:90px;
    background: #ccc;
    transition: 0.6s;
    transform-style: preserve-3d;
}

.tile-front, .tile-back{
    height: 100%;
    display: table;
    backface-visibility: hidden;
    position: absolute;
    top:0;
    left: 0;
    text-align: center;
}

.tile-front {
z-index: 2;
    /* for firefox 31 */
    transform: rotateY(0deg);
}

/* back, initially hidden pane */
.tile-back {
    transform: rotateY(180deg);
}

.tile-content {
    display: table-cell;
    vertical-align: middle;
    padding: 3px 8px;
    cursor: pointer;
}

.tile-content p {
    font-size: 10pt;
    color: #fff;
}

.tile-content a {
    text-decoration: none;
    color: #fff;
    font-size: 14pt;
    text-shadow: none;
    -webkit-transition: 200ms linear 0s;
    -moz-transition: 200ms linear 0s;
    -o-transition: 200ms linear 0s;
    transition: 200ms linear 0s;
    outline: 0 none;
}

.tile-content a:hover, .tile-content a:focus, .tile-content a.hover {
    color: #fff;
    font-size: 14pt;
    text-shadow: -1px 1px 8px #ffc, 1px -1px 8px #fff;
}

.tile.yellow {
    border-color: #d4b900;
}

.yellow .tile-content {
   background: #ffe0dd;
    background-image: -webkit-linear-gradient(top left, #ffe63b, #d4b900);
    background-image: -o-linear-gradient(top left, #ffe63b, #d4b900);
    background-image: linear-gradient(to bottom right, #ffe63b, #d4b900);
}

.yellow .tile-icons {
    background: #d4b900;
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

            <div class="tile service-group yellow">
                <div class="tile-body row">
                    <div class="tile-front">
                        <div class="tile-content">
                            <a href="#">Student Union</a>
                        </div>
                    </div>
                    <div class="tile-back">
                        <div class="tile-content">
                            <p>Long text description of this organisation</p>
                        </div>
                    </div>
                </div>
                <div class="tile-icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-star fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-star fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-star fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-star fa-lg"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="wall">

            <div class="tile endpoint yellow">
                <div class="tile-body row">
                    <div class="tile-front">
                        <div class="tile-content">
                            <a href="#">Student Union</a>
                        </div>
                    </div>
                    <div class="tile-back">
                        <div class="tile-content">
                            <p>Long text description of this organisation</p>
                        </div>
                    </div>
                </div>
                <div class="tile-icons">
                    <ul>
                        <li><a href="#"><i class="fa fa-star fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-star fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-star fa-lg"></i></a></li>
                        <li><a href="#"><i class="fa fa-star fa-lg"></i></a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

</body>
<script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
<script src="/assets/vendor/foundation/js/vendor/fastclick.js"></script>
<script src="/assets/vendor/foundation/js/foundation.min.js"></script>
<script src="/assets/vendor/foundation/js/foundation/foundation.topbar.js"></script>    
<script src="/assets/vendor/foundation/js/foundation/foundation.tooltip.js"></script>
<script src="/assets/vendor/metafizzy/packery.pkgd.min.js"></script>
<script src="/assets/js/app.js"></script>
</html>