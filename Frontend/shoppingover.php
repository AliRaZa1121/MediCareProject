<?php
session_start();
session_unset();
session_destroy();
session_write_close();
setcookie(session_name(),'',0,'/');
?>
<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Medicative Hospital || Health & Medical HTML Template</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <!-- Favicon -->
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="preloader"></div>



    <!-- Header navbar end -->
    <div class="coming-soon over-layer-black" id="coming-soon" style="background-image: url('img/bg/3.jpg') " >
        <div class="inner-bg">
            <div class="container padding-top-bottom-150">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <!-- Count down area -->
                        <div class="timer">
                            <div class="days-wrapper">
                                </div>
                           
                           
                        </div>

        
                        <div class="content">
                            <h2>Thank You For Shopping</h2>
                            <p>Thank you for your purchase from Medicative Medical Store. <br>Please let us know if we can do anything else to help. Stay Healthy!</p>
                            <a href="index.php"><button type="submit" class="btn btn-theme hvr-bounce-to-top" data-text="Send Message"><span>Back To Home Page</span></button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Footer Style End -->

  
    <a href="#" class="scrollup"><i class="pe-7s-up-arrow" aria-hidden="true"></i></a>
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- all plugins and JavaScript -->
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/css3-animate-it.js"></script>
    <script type="text/javascript" src="js/bootstrap-dropdownhover.min.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/gallery.js"></script>
    <script type="text/javascript" src="js/player.min.js"></script>
    <script type="text/javascript" src="js/retina.js"></script>
    <script type="text/javascript" src="js/comming-soon.js"></script>

    <!-- Main Custom JS -->
    <script type="text/javascript" src="js/script.js"></script>


</body>



</html>
