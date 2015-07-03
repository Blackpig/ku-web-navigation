<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic Page Needs
 ================================================== -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="description" content="Font Awesome, the iconic font and CSS framework">
  <meta name="author" content="Dave Gandy">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">

  <title>Service Desk Web Navigation - Icon Selection</title>

  <!-- CSS
  ================================================== -->
  <link rel="stylesheet" href="../../../assets/css/icons.css">        
  <link rel="stylesheet" href="/assets/vendor/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="./../../assets/vendor/font-awesome/fonts/font-awesome.css">

  <!--[if lt IE 9]>
    <script src="../assets/js/html5shiv.js"></script>
    <script src="../assets/js/respond.min.js"></script>
  <![endif]-->

 @yield('header')

<div class="container">
  

 @yield('content')


</div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script type="text/javascript">
  
    $(document).ready(function(){

      $('.fontawesome-icon-list a').click(function(e){

                e.preventDefault();

        if (!$('#dept').val()) {
          alert('Please select the organisation or student channel first');
          return;
        }

        var t_id = $('input[name=choice]:checked').attr('id');
        var icon = $(this).children('i').attr('class');
        var icons = icon.split(' ');
        $('#'+t_id+"choice").val(icons[1]);
        $('#'+t_id+'icon' ).removeClass().addClass(icon);

      })

    $('#submit').click(function(e){
      e.preventDefault();
      if ( !$('#primarychoice').val() || !$('#altchoice').val()) {
        alert('Please select your primary and alternative icon choice');
      } else {

        var data = $('#selectah').serialize();

        $.post( "icon-selector", data, function( data ) {})
        .done(function() {
          alert( "Your choices have been recorded. You will receive a confirmation email shortly" );
        })

        .fail(function() {
            alert( "Uh oh! It appears there was problem! Please try again" );
        })

      }
    })

  })

  </script>
  </body>
</html>
