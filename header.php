<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="Backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="Backend/css/sb-admin-2.min.css" rel="stylesheet">
  

  


<!--bootstrap cdn-->
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

  
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
          <i class="fas fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Medicative <sup>Hospital</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        MAIN
      </div>

<?php session_start();
if ($_SESSION['utid'] == null) {
   header("location: FrontEnd/index.php");
}
 ?>

<?php if (isset($_SESSION['utid']) && $_SESSION['utid'] == 1) { ?>

  <!-- Nav Item - Pages Collapse Menu -->
 
  <li class="nav-item">
    <a class="nav-link" href="doctors.php">
      <i class="fas fa-user-nurse"></i>
      <span>Doctors</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="patients.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Patients</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="users.php">
      <i class="fas fa-fw fa-user"></i>
      <span>Users</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="cities.php">
      <i class="fas fa-fw fa-location-arrow"></i>
      <span>Cities</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="newslist.php">
      <i class="fas fa-newspaper"></i>
      <span>News/Blogs</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="specialities.php">
      <i class="fas fa-fw fa-medkit"></i>
      <span>Specialities</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    BOOKINGS
  </div>

  <li class="nav-item">
    <a class="nav-link" href="doctoravailability.php">
      <i class="fas fa-fw fa-clock"></i>
      <span>Doctors Availability</span></a>
  </li>


  <li class="nav-item">
    <a class="nav-link" href="appointments.php">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Appointments</span></a>
  </li>

   <!-- Divider -->
   <hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Shopping
</div>

<li class="nav-item">
    <a class="nav-link" href="products.php">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Products</span></a>

      <li class="nav-item">
    <a class="nav-link" href="categories.php">
      <i class="fas fa-fw fa-snowplow"></i>
      <span>Products Categories</span></a>

      <a class="nav-link" href="orders.php">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Orders</span></a>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    OTHERS
  </div>


  <li class="nav-item">
    <a class="nav-link" href="adminprofile.php">
      <i class="fas fa-fw fa-user"></i>
      <span>My Profile</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="contact.php">
      <i class="fas fa-inbox"></i>
      <span>Messages</span></a>
  </li>



  <li class="nav-item">
    <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure to logout?');">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Log Out</span></a>
  </li>

<?php } else if(isset($_SESSION['utid']) && $_SESSION['utid'] == 2) { ?>

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="doctorsprofile.php">
      <i class="fas fa-fw fa-user"></i>
      <span>View Profile</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="editdoctorprofile.php?id=<?php echo $_SESSION['id'] ?>">
      <i class="fas fa-fw fa-user"></i>
      <span>Edit Profile</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="appointments.php">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>Appointments</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="manageavailability.php">
      <i class="fas fa-fw fa-clock"></i>
      <span>Manage Availability</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="logout.php" onclick="return confirm('Are you sure to logout?');">
      <i class="fas fa-fw fa-user"></i>
      <span>Log Out</span></a>
  </li>

<?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      

    </ul>
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
           

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>




            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">



                <span class="mr-3 d-none d-lg-inline text-gray-900 medium">
                <?php
                  if ($_SESSION['name'] !=""){
                    echo $_SESSION['name'];
                  } else {
                    echo "Admin";
                  }?>
                </span>
                <img class="img rounded-circle" src="uploading/<?php
                if($_SESSION['photo']!="")
                {
                  echo $_SESSION['photo'];
                }
                else {
                  echo "admin.png";
                }
                ?>" style="border:1px solid #CCC" width="60" height="60">
              </a>
              <!-- Dropdown - User Information -->

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
