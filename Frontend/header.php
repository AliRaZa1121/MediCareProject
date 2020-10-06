
<?php include 'dbconnection.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Medicative Hospital || Health & Medical HTML Template</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive stylesheet  -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <!-- Favicon -->
    <link href="img/favicon.png" rel="shortcut icon" type="image/png">
 
     


    
</head>

<body>

    <div class="preloader"></div>
    <!-- Header navbar start -->
    <div class="header-topbar style-2">
        <div class="container padding-none">
            <div class="row">
                <div class="col-md-8 col-sm-6 welcome-top">
                    <ul class="list-inline top-icon">
                        <li><i class="fa fa-envelope"></i> contact@medicative.com</li>
                        <li><i class="fa fa-clock-o"></i> Mon - Mon 8.00 AM - 11.00 PM</li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6">
                    <ul class="list-inline text-right icon-style-1">
                        <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                        <li class=" hvr-rectangle-out"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navbar conner-style style-2 position-fixed">
        <div class="container padding-none">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand dis-none" ><img src="img/logo-black.png" alt="">
                                </a>
                            <a class="navbar-brand dis-block" ><img src="img/logo-black.png" alt="">
                                </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations-delay="1.8s" data-animations="fadeInUp">
                            <ul class="nav navbar-nav bg-none navbar-right style-3">

                              <?php

                              if (session_status() == PHP_SESSION_NONE) {
                                  session_start();
                              }
                            // if ($_SESSION['utid']==null) {
                            //     header("location: index.php");
                            // }
                             
                               ?>

                              <?php
                             
                              
                              if (isset($_SESSION['utid']) && $_SESSION['utid'] == 3) { ?>
                                        <li class="dropdown">
                                            <a href="index.php">Home</span></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="doctors.php">Doctors</a>
                                        </li>
                                        
                                        <li class="dropdown">
                                            <a href="Department.php" >Department </a>
                                        </li>

                                        <li class="dropdown">
                                            <a href="blogs.php" >Blogs </a>
                                        </li>

                                        <li class="dropdown">
                                        <li><a href="viewappointments.php">My Appointments</a>
                                        </li>

                                        <!-- <li class="dropdown">
                                        <li><a href="products.php">Store</a></li>
                                        </li> -->

                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span data-hover="Doctors">Store <i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="products.php">Products</a></li>
                                                <li><a href="cart.php">View Cart</a></li>
                                                <li><a href="checkout.php">Check out</a></li>
                                            </ul>
                                        </li>


                                        <li class="dropdown">
                                            <a href="contact.php">Contact</a>
                                        </li>

                                        <li>
                                        <div class="dropdown-buttons">
                                        <div class="btn-group">
                                            <button type="button" class="btn dropdown-toggle" id="header-drop-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon icon-ShoppingCart"></i><span class="menu-cart">8</span></button>
                                            <ul class="dropdown-menu dropdown-menu-right cart dropdown-animation" aria-labelledby="header-drop-4">
                                                <li>
                                                    <table class="table table-hover" style="margin-right: 50px;">
                                                        <thead>
                                                        <tr>
                                                            <th class="quantity">QTY</th>
                                                            <th class="product">Product</th>
                                                            <th class="amount">Subtotal</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="quantity">2 x</td>
                                                            <td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
                                                            <td class="amount">$199.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="quantity">3 x</td>
                                                            <td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
                                                            <td class="amount">$299.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="quantity">3 x</td>
                                                            <td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
                                                            <td class="amount">$1499.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="total-quantity" colspan="2"><strong>Total 8 Items</strong></td>
                                                            <td class="total-amount"><strong>$1997.00</strong></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="panel-body text-right">
                                                        <a href="#" class="menu-shop-btn">View Cart</a>
                                                        <a href="#" class="menu-shop-btn">Checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        </div>
                                        </li>
                                        
                                            
                                                
                                                <!-- Profile box End -->
                                                <li>
                                        <div class="dropdown-buttons">
                                               <div class="btn-group">
                                            <button type="button" class="btn dropdown-toggle" id="header-drop-4" data-toggle="dropdown"><i class="fa fa-user"></i><span class="menu-cart">8</span></button>
                                            <ul class="dropdown-menu cart dropdown-animation">
                                              <li><a href="patientsprofile.php">View Profile</a></li>
                                              <li><a href="editpatientsprofile.php">Edit Profile</a></li>
                                              
                                              <li><a href="logout.php"onclick="return confirm('Are you sure to logout?');">Logout</a></li>

                                            </ul>
                                        </div>
                                        </div>
                                        </li>

                                      <?php } else { ?>

                                          <li class="dropdown">
                                              <a href="index.php">Home</span></a>
                                          </li>
                                          <li class="dropdown">
                                              <a href="doctors.php">Doctors</a>
                                          </li>
                                          <li class="dropdown">
                                            <a href="Department.php" >Department </a>
                                        </li>
                                        
                                          <li class="dropdown">
                                              <a href="blogs.php" >Blogs </a>
                                          </li>

                                          
                                        <!-- <li class="dropdown">
                                        <li><a href="products.php">Store</a></li>
                                        </li> -->
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span data-hover="Doctors">Store <i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="products.php">Products</a></li>
                                                <li><a href="cart.php">View Cart</a></li>
                                                <li><a href="checkout.php">Check out</a></li>
                                            </ul>
                                        </li>
                                          <li class="dropdown">
                                              <a href="contact.php">Contact</a>
                                          </li>      

                                         
                                      <li style="margin-top: 20px;">
                                          <div class="btn-group">
                                            <button type="button" class="btn dropdown-toggle" id="header-drop-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon icon-ShoppingCart"></i><span class="menu-cart">8</span></button>
                                            <ul class="dropdown-menu dropdown-menu-right cart dropdown-animation" aria-labelledby="header-drop-4">
                                                <li>
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th class="quantity">QTY</th>
                                                            <th class="product">Product</th>
                                                            <th class="amount">Subtotal</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="quantity">2 x</td>
                                                            <td class="product"><a href="shop-product.html">Android 4.4 Smartphone</a><span class="small">4.7" Dual Core 1GB</span></td>
                                                            <td class="amount">$199.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="quantity">3 x</td>
                                                            <td class="product"><a href="shop-product.html">Android 4.2 Tablet</a><span class="small">7.3" Quad Core 2GB</span></td>
                                                            <td class="amount">$299.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="quantity">3 x</td>
                                                            <td class="product"><a href="shop-product.html">Desktop PC</a><span class="small">Quad Core 3.2MHz, 8GB RAM, 1TB Hard Disk</span></td>
                                                            <td class="amount">$1499.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="total-quantity" colspan="2"><strong>Total 8 Items</strong></td>
                                                            <td class="total-amount"><strong>$1997.00</strong></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="panel-body text-right">
                                                        <a href="#" class="menu-shop-btn">View Cart</a>
                                                        <a href="#" class="menu-shop-btn">Checkout</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
</li>

                                       <li class="dropdown">
                                            <div class="dropdown-buttons">
                                              <a style="font-weight: bold; line-height: 30px;" href="login.php">Login / Register</a>
                                            </div>
                                          </li>

                                              <?php } ?>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header navbar end -->
