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

          <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation"> 
        <div class="container topnav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="/"><img id="navLogo" src="images/logo.png" alt=""></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if(isset(Auth::user()->name))
                      @if(Auth::user()->admin1_user0 == 1)
                         <li>
                              <a href="/dashboard">Beheer Deelnemers</a>
                         </li>
                      @endif
                    @endif
                    @if(isset(Auth::user()->name))
                      <li>
                            <p id="welcomeTitle">Welkom {{Auth::user()->name}}</p>
                      </li>
                    @endif
                    @if(!isset(Auth::user()->name))
                      <li>
                          <a type="button" data-toggle="modal" data-target="#login-modal">Inloggen <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a>
                      </li>
                    @endif
                    @if(isset(Auth::user()->name))
                      <li>
                          <a href="/auth/logout">Uitloggen <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a>
                      </li>
                    @endif
                    @if(!isset(Auth::user()->name))
                      <li>
                          <a type="button" data-toggle="modal" data-target="#register-modal">Registreer</a>
                      </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
            @yield('content')
    </body>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script src="js/sweetalert.min.js"></script>
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

<!-- wanneer er een lotje is -->
@if(isset($lotteryImg))

<style>
canvas {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    outline: none;
    -webkit-tap-highlight-color: rgba(255, 255, 255, 0); /* mobile webkit */
}  

img {
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-o-user-select: none;
user-select: none;
}


</style>


  @if($lotteryImg == 'win')
   <script type="text/javascript">

          $('#lot1').wScratchPad({
            bg: './images/lot-symbols.jpg',
            fg: './images/overlay-symbols.jpg',
            'cursor': 'url("./images/coin.png") 5 5, default',
            scratchMove: function (e, percent) {
              if (percent > 50) {
                this.clear();
              }
            }
          });

          $('#lot2').wScratchPad({
            bg: './images/lot-win.jpg',
            fg: './images/overlay-result.jpg',
            'cursor': 'url("./images/coin.png") 5 5, default',
            scratchMove: function (e, percent) {
              if (percent > 50) {
                this.clear();
                
                swal({   title: "Je hebt gewonnen!",   text: "Er wordt met jouw contact opgenomen!", "succes"});
              }
            }
          });


  </script>
  @else 
      <script type="text/javascript">

          $('#lot1').wScratchPad({
            bg: './images/lot-symbols.jpg',
            fg: './images/overlay-symbols.jpg',
            'cursor': 'url("./images/coin.png") 5 5, default',
            scratchMove: function (e, percent) {
              if (percent > 50) {
                this.clear();
              }
            }
          });



          $('#lot2').wScratchPad({
            bg: './images/lot-lose.jpg',
            fg: './images/overlay-result.jpg',
            'cursor': 'url("./images/coin.png") 5 5, default',
            scratchMove: function (e, percent) {
              if (percent > 50) {
                this.clear();
                swal("Jammer!", "Je hebt niet gewonnen , probeer nogmaals!", "error")
              }
            }
          });
      </script>
    @endif

@endif

                 
@if (session()->has('registerFail'))
<!--  modal openen als validation op registreren failt -->
  <script type="text/javascript">
  $( document ).ready(function() {
      $('#register-modal').modal('show'); 
  });
  </script>
@endif

@if (session()->has('loginFail'))
<!--  modal openen als validation op inloggen failt -->
  <script type="text/javascript">
  $( document ).ready(function() {
      $('#login-modal').modal('show'); 
  });
  </script>
@endif

</html>