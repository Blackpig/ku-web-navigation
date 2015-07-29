<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>KU Navigator</title>
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/vendor/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/routes-1.css"/>
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
        <base href="/">
        <style>
        </style>
    </head>
    <body>
        <div class="my-kingston">
            <div class="slide red" id="im-1">
                <div class="panel">
                    <p class="question">Where can I learn about <span>student loans?</span></p>
                    <img class="im1" src="../assets/images/routes/mk-slide-1-1.jpg"/>
                    <div class="answer">
                        <a href="https://kuplayer.kingston.ac.uk">
                            <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                            <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="slide orange" id="im-2">
                <div class="panel">
                    <p class="question">How can I <span>change my course?</span></p>
                    <img class="im2" src="../assets/images/routes/mk-slide-1-2.jpg"/>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                    </div>
                </div>
            </div>

            <div class="slide yellow" id="im-3">
                <div class="panel">
                    <p class="question">Who do we speak to about <span>our accommodation?</span></p>
                    <img class="im3" src="../assets/images/routes/mk-slide-1-3.jpg"/>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                    </div>
                </div>
            </div>

            <div class="slide green" id="im-4">
                <div class="panel">
                    <p class="question">I can ask another <span>question here?</span></p>
                    <img class="im4" src="../assets/images/routes/mk-slide-1-4.jpg"/>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                    </div>
                </div>
            </div>

            <div class="slide blue" id="im-5">
                <div class="panel">
                    <p class="question">Where do I print <span>my dissertation?</span></p>
                    <img class="im5" src="../assets/images/routes/mk-slide-1-5.jpg"/>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                    </div>
                </div>
            </div>

             <div class="slide purple" id="im-6">
                <div class="panel">
                    <p class="question">What question could <span>I ask my tutor?</span></p>
                    <img class="im6" src="../assets/images/routes/mk-slide-1-1.jpg"/>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                    </div>
                </div>
            </div>

             <div class="slide pink" id="im-7">
                <div class="panel">
                    <p class="question">Are student services open <span>at the weekend?</span></p>
                    <img class="im7" src="../assets/images/routes/mk-slide-1-2.jpg"/>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                    </div>
                </div>
            </div>

        </div>
    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/assets/vendor/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.my-kingston').slick({
                autoplay: true,
                speed: 700,
                arrows: false,
                dots: false,
                draggable: false,
                fade: true,
                pauseOnHover: false
            });
        });

        $('.slide').click(function(){
            openKUPlayer();
        })

        $('a').click(function(e){
            e.preventDefault();
            openKUPlayer();
        })

        function openKUPlayer() {
            var url = 'https://kuplayer.kingston.ac.uk';

            $("<a>").attr("href", url).attr("target", "_blank")[0].click();
        }

    </script>          
</html>
