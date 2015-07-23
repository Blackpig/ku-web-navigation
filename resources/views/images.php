<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <title>KU Navigator Images</title>
        <base href="/">
        <style>
            .left {float:left;}
            img {margin:5px;}
        </style>
    </head>
    <body>
        <div>
            <h1>Landscape</h1>
            <div>
            <?php

                $i = 1;
                do {

                    if ($i%5 == 0) {
                        echo echo '</div><div><img src="../assets/images/img-wide-'.$i.'.jpg" class="left">';
                    } else {

                        echo '<img src="../assets/images/img-wide-'.$i.'.jpg" class="left">';
                    }
                $i++
                } while ($i <= 38);
            ?>
            </div>
        </div>
        <div>
            <h1>Portrait</h1>
            <div>
            <?php

                $i = 1;
                do {

                    if ($i%5 == 0) {
                        echo echo '</div><div><img src="../assets/images/img-tall-'.$i.'.jpg" class="left">';
                    } else {

                        echo '<img src="../assets/images/img-tall-'.$i.'.jpg" class="left">';
                    }
                $i++
                } while ($i <= 16);
            ?>
            </div>
        </div>
        <div>
            <h1>Square</h1>
            <div>
            <?php

                $i = 1;
                do {

                    if ($i%5 == 0) {
                        echo echo '</div><div><img src="../assets/images/img-square-'.$i.'.jpg" class="left">';
                    } else {

                        echo '<img src="../assets/images/img-square-'.$i.'.jpg" class="left">';
                    }
                $i++
                } while ($i <= 18);
            ?>
            </div>
        </div>
    </body>
</html>
