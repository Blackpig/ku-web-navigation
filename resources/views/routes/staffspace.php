<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>KU Web Nav</title>
        <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
        <base href="/">
        <style>
.wrapper {
  position: fixed;
  top: 50%;
  left: 50%;
  /* bring your own prefixes */
  transform: translate(-50%, -50%);
}

.scene {
    -webkit-perspective: 1000px;
    width: 270px;
    height: 235px;
    border: 2px solid #0492d4;
    border-bottom: none;
    overflow: hidden;
}

.object {
    -webkit-transform-style: preserve-3d;
    -webkit-transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
    position: absolute;
    width: 100%;
    height: 100%;

animation: rotate3d7 linear infinite 14s;
  animation-name: rotate3d7;
  animation-duration: 14s;
  animation-timing-function: linear;
  animation-delay: initial;
  animation-iteration-count: infinite;
  animation-direction: initial;
  animation-fill-mode: initial;
  animation-play-state: initial;
}

.face {
    position: absolute;
    left: 165px;
    top: 15px;
}


    #im1 { top: 30px; transform: translateZ(75px); }
    #im2 { top: 30px; transform: translateZ(-75px); }
    #im3 { top: 30px; transform: translateX(75px) rotateY(90deg);}
    #im4 { top: 30px; transform: translateX(-75px) rotateY(-90deg);}
    #im5 { top: 30px; transform: translateY(75px) rotateX(90deg);}
    #im6 { top: 30px; transform: translateY(-75px) rotateX(-90deg);}
    
    :hover > #im1 { top: 30px; transform: translateZ(100px); }
    :hover > #im2 { top: 30px; transform: translateZ(-100px); }
    :hover > #im3 { top: 30px; transform: translateX(100px) rotateY(90deg);}
    :hover > #im4 { top: 30px; transform: translateX(-100px) rotateY(-90deg);}
    :hover > #im5 { top: 30px; transform: translateY(100px) rotateX(90deg);}
    :hover > #im6 { top: 30px; transform: translateY(-100px) rotateX(-90deg);}
    
    div#obj6
    {
        animation: rotate3d7 linear infinite 14s;
    }
    
    @keyframes rotate3d7
    {
        from { transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg); }
        to   { transform: rotateX(360deg) rotateY(720deg) rotateZ(1080deg); }
    }

    footer {
        background: #0492d4;
        color: #fff;
        font-size: 14pt;
        line-height: 30pt;
        text-align: center;
        width: 270px;
    }

    footer a {
        color: #fff;
        text-decoration: none;
    }

    footer a:hover {
        color: #fff;
        text-decoration: underline;
    }

        </style>
    </head>
    <body>
        <div class="wrapper">
       <div class="scene" style="margin-top: 60px" id="sce6">
           <div class="object" id="obj6">
             <img class="face" src="/assets/images/bg-kompass.png" id="im1">
             <img class="face" src="/assets/images/bg-kompass.png" id="im2">
             <img class="face" src="/assets/images/bg-kompass.png" id="im3">
             <img class="face" src="/assets/images/bg-kompass.png" id="im4">
             <img class="face" src="/assets/images/bg-kompass.png" id="im5">
             <img class="face" src="/assets/images/bg-kompass.png" id="im6">
           </div>
        </div>
        <footer>
            <a href="https://kuplayer.kingston.ac.uk/0">KU Navigator</a>
        </footer>
        </div>
    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
</html>
