<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>Navigator</title>
        <link rel="stylesheet" href="/assets/vendor/foundation/css/foundation.min.css">
        <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
        <script src="/assets/vendor/foundation/js/vendor/modernizr.js"></script>
        <base href="/">
    </head>
    <body>
        <div class="wrapper">
         <div class="staffspace">
            <div class="slide" id="im-1">
                <a href="https://kuplayer.kingston.ac.uk">
                    <img src="../assets/images/routes/staffspace.jpg" />
                </a>
            </div>
        </div>
    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
    <script src="/assets/vendor/slick/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.staffspace').slick({
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
    </body>
    <script src="/assets/vendor/jquery/jquery-1.11.2.min.js"></script>
</html>
