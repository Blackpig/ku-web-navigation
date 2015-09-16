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
        <link href='https://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css'>
        <base href="/">
        <style>
        </style>
    </head>
    <body>
        <div class="my-kingston">
            <div class="slide" id="im-1">
                <a href="https://navigator.kingston.ac.uk">
                    <img src="../assets/images/routes/my_kingston_1.jpg" />
                </a>
            </div>

            <div class="slide" id="im-2">
                <a href="https://navigator.kingston.ac.uk">
                    <img src="../assets/images/routes/my_kingston_2.jpg" />
                </a>
            </div>

            <div class="slide" id="im-3">
                <a href="https://navigator.kingston.ac.uk">
                    <img src="../assets/images/routes/my_kingston_3.jpg" />
                </a>
            </div>

            <div class="slide" id="im-4">
                <a href="https://navigator.kingston.ac.uk">
                    <img src="../assets/images/routes/my_kingston_4.jpg" />
                </a>
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
            var url = 'https://navigator.kingston.ac.uk';

            $("<a>").attr("href", url).attr("target", "_blank")[0].click();
        }

    </script>          
</html>
