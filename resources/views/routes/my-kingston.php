<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>KU Navigator</title>
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="/assets/vendor/slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/routes.css"/>
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
        <base href="/">
        <style>
        </style>
    </head>
    <body>
        <div class="my-kingston">
            <div class="slide" id="im-1">
                <p class="question">Where can I learn about <span>student loans?</span></p>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                </div>
            </div>

            <div class="slide" id="im-2">
                <p class="question">How can I <span>change my course?</span></p>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                </div>
            </div>

            <div class="slide" id="im-3">
                <p class="question">Who do we speak to about <span>our accommodation?</span></p>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                </div>
            </div>

            <div class="slide" id="im-4">
                <p class="question">I can ask another <span>question here?</span></p>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
                </div>
            </div>

            <div class="slide" id="im-5">
                <p class="question">Where do I print <span>my dissertation?</span></p>
                <div class="answer">
                    <a href="https://kuplayer.kingston.ac.uk">
                        <img src="../assets/images/navigator-logo-blue-on-white-140x140.png" />
                        <p>KU Navigator<br /><span class="take-me">Take me there<i class="fa fa-long-arrow-right"></i></span></p>
                    </a>
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
