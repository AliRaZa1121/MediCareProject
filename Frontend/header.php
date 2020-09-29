
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
                               
                               ?>

                              <?php if (isset($_SESSION['utid']) && $_SESSION['utid'] == 3) { ?>
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
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span data-hover="Doctors">Appointments <i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="appointment.php">Book Appointments</a></li>
                                                <li><a href="viewappointments.php">View Appointments</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a href="contact.php">Contact</a>
                                        </li>

                                        <li>
                                            <div class="dropdown-buttons">
                                                <!-- Search box Start -->
                                                <!-- <div class="btn-group menu-search-box">
                                                    <button type="button" class="btn dropdown-toggle" id="header-drop-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon icon-Search"></i></button>

                                                    <ul class="dropdown-menu dropdown-menu-right dropdown-animation" aria-labelledby="header-drop-3">
                                                        <li>

                                                            <form role="search" class="search-box" method="get" action="search.php">
                                                              
                                                            <div class="form-group" style=" width: 100%;">
                                                                <label for="">Select Doctor's Speciality:</label>
                                                                <select class="form-control" name="speciality">
                                                                  <option value="" disabled selected>Select Specialty</option>
                                                                  <?php
                                                                  $query = $pdo->query("Select * from specialities");
                                                                  $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                                                  foreach ($rows as $row): ?>
                                                                    <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                                                                  <?php endforeach; ?>
                                                                </select>
                                                              </div>
                                                              <div class="form-group">
                                                                <label for="">Select Your City:</label>
                                                                <select class="form-control" name="city">
                                                                  <option value="" disabled selected>Select City</option>
                                                                  <?php
                                                                  $query = $pdo->query("Select * from cities");
                                                                  $crows = $query->fetchAll(PDO::FETCH_ASSOC);
                                                                  foreach ($crows as $crow): ?>

                                                                    <option value="<?php echo $crow['Id'] ?>"><?php echo $crow['Name'] ?></option>
                                                                  <?php endforeach; ?>
                                                                </select>
                                                              </div>
                                                                <div class="form-group">
                                                                    <input type="submit" class="btn btn-success" name="btnsearch" value="Search" style="background-color:#00B092;color:white;border:none;margin-top:15px">
                                                                </div>
                                                              </form>
                                                        </li>
                                                    </ul>
                                                </div> -->
                                                <!-- Search box End -->
                                               <div class="btn-group">
                                            <button type="button" class="btn dropdown-toggle" id="header-drop-4" data-toggle="dropdown"><i class="fa fa-user"></i><span class="menu-cart">8</span></button>
                                            <ul class="dropdown-menu cart dropdown-animation">
                                              <li><a href="patientsprofile.php">View Profile</a></li>
                                              <li><a href="editpatientsprofile.php">Edit Profile</a></li>
                                              <li><a href="logout.php">Logout</a></li>

                                            </ul>
                                        </div>

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

                                          <li class="dropdown">
                                              <a href="contact.php">Contact</a>
                                          </li>


                                          <li>
                                              <div class="dropdown-buttons">
                                                  <div class="btn-group menu-search-box">
                                                      <button type="button" class="btn dropdown-toggle" id="header-drop-3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon icon-Search"></i></button>

                                                      <ul class="dropdown-menu dropdown-menu-right dropdown-animation" aria-labelledby="header-drop-3">
                                                          <li>

                                                              <form role="search" class="search-box" method="get" action="search.php">
                                                                <div class="form-group">
                                                                  <label for="">Select Doctor's Speciality:</label>
                                                                  <select class="form-control" name="speciality">
                                                                    <option value="" disabled selected>Select Specialty</option>
                                                                    <?php
                                                                    $query = $pdo->query("Select * from specialities");
                                                                    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                                                    foreach ($rows as $row): ?>
                                                                      <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                                                                    <?php endforeach; ?>
                                                                  </select>
                                                                </div>
                                                                <div class="form-group">
                                                                  <label for="">Select Your City:</label>
                                                                  <select class="form-control" name="city">
                                                                    <option value="" disabled selected>Select City</option>
                                                                    <?php
                                                                    $query = $pdo->query("Select * from cities");
                                                                    $crows = $query->fetchAll(PDO::FETCH_ASSOC);
                                                                    foreach ($crows as $crow): ?>

                                                                      <option value="<?php echo $crow['Id'] ?>"><?php echo $crow['Name'] ?></option>
                                                                    <?php endforeach; ?>
                                                                  </select>
                                                                </div>
                                                                <div class="form-group">
                                                                  <label for="">Custom Search:</label>
                                                                    <input type="text" class="form-control" name="keyword" placeholder="Enter Your Search">
                                                                </div>
                                                                  <div class="form-group">
                                                                      <input type="submit" class="btn btn-success" name="btnsearch" value="Search" style="background-color:#00B092;color:white;border:none;margin-top:15px">
                                                                  </div>
                                                                </form>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                </div>
                                                </li>

                                                <!-- <li class="dropdown">
                                                    <a href="login.php">Login/Register</a>
                                                </li> -->

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
