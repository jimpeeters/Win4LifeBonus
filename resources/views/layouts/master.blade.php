<!DOCTYPE html>
<html lang="nl">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Een wedstrijd maken voor web development">
    <meta name="author" content="Jim Peeters">

    <head>
        <title>Win For Life Bonus - @yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href="stylesheets/landing-page.css" rel="stylesheet">
        <link rel="stylesheet" href="stylesheets/style.css">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    </head>
    <body>

            @yield('content')


    </body>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script type="text/javascript" src="js/wScratchPad.min.js"></script>
<!-- springen naar sectie b  -->
@if (isset($jumpSectionA))
    <script>
    $( document ).ready(function() {

            $('html, body').animate({
                scrollTop: $(".content-section-a").offset().top
            }, 2000);

    });

    </script>
@endif

@if(isset($lotteryImg))
 <script type="text/javascript">
        $('#lot1').wScratchPad({
          bg: './images/lot-symbols.jpg',
          fg: './images/overlay-symbols.jpg',
          'cursor': 'url("./images/coin.png") 5 5, default',
          scratchMove: function (e, percent) {
            if (percent > 70) {
              this.clear();
            }
          }
        });

        $('#lot2').wScratchPad({
          bg: './images/lot-symbols.jpg',
          fg: './images/scratch-to-win.png',
          'cursor': 'url("./images/coin.png") 5 5, default',
          scratchMove: function (e, percent) {
            if (percent > 70) {
              this.clear();
            }
          }
        });
</script>
@endif

</html>