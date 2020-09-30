<?php include 'header.php'; ?>

<section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="mini-title inner-style-2">
                    <h3>Doctor Details</h3>
                    <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Doctor Details</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team start -->
<section class="team-area">
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-5">

                  <?php
                  $msg = "";
                  $error = "";
                  $iid = $_GET['iid'];
                  
                  include 'dbconnection.php';
                  $query = $pdo->prepare("SELECT doctors.*, specialities.name as SpecName, cities.name as CityName from doctors
                                          JOIN specialities ON specialities.id = doctors.SpecialityId
                                          Join cities on cities.id = doctors.cityid
                                           where doctors.id =:eid");
                  $query->bindparam("eid",$iid,PDO::PARAM_INT);
                  $query->execute();
                  $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                  foreach ($rows as $row) {
                  ?>

                    <div class="team-item-2">
                        <img src="../uploading/<?php echo $row['Photo'] ?>" alt="">
                        <div class="team-contact">
                            <ul>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                        <div class="team-content">
                            <h4><a href="#">Dr. <?php echo $row['Name'] ?></a></h4>
                            <h6><?php echo $row['SpecName'] ?></h6>
                            <h6><?php echo $row['CityName'] ?></h6>
                            
                        </div>
                    </div>

                    <div class="bg-f8 padding-20 margin-top-50">
                      <div class="footer-item footer-widget-one margin-bottom-10">
                        <div class="footer-title">
                          <h4>Availability Hours</h4>
                          <div class="border-style-2"></div>
                        </div>
                        <ul class="footer-list border-deshed">
                          <?php
                          
                        $query = $pdo->prepare("SELECT * from doctoravailability where DoctorId=:did");
                        $query->bindparam("did",$iid,PDO::PARAM_INT);
                        $query->execute();
                        $records = $query->fetchAll(PDO::FETCH_ASSOC);
                        
                        
                        foreach ($records as $item) { ?>
                            <li class="clearfix"> <span> <?php echo $item['Day'] ?> :  </span>
                            <?php
                            $ftime = $item['FromTime'];
                            $fromtime = strtotime($ftime);
                            
                            $etime = $item['EndTime'];
                            $endtime = strtotime($etime);
                                                   
                            ?>
                            <div class="value pull-right"> <?php echo date("g:ia", $fromtime); ?> - <?php echo date("g:ia", $endtime); ?> </div>
                          <?php } ?>
                          </li>
                        </ul>
                      </div>
                    </div>


                </div>
                <div class="col-md-7 team-area">
                    <div class="team-details-content">
                        <h2><a href="#"> DR. <?php echo $row['Name'] ?> </a></h2>
                        <h6><?php echo $row['SpecName'] ?></h6>
                        
                        <h4>Medical doctor</h4>
                        <div class="border-style-2 margin-bottom-30"></div>
                        <p><strong>Doctors are trained in medical</strong> which are usually part of a university. They usually hold a college degree in medicine. <strong>Doctors work in hospitals, medical clinics, from their own offices, </strong>or may even visit people in their homes. They may also work for schools, companies, sports teams, or the military. Medical doctors are often assisted in their work by nurses</p>
                        <?php } ?>
                       
                        <div class="margin-bottom-30">
                            <h4>ABOUT</h4>
                            <div class="border-style-2 margin-bottom-30"></div>
                            <p><?php echo $row['Details'] ?></p>
                        </div>
                        
                        <?php

                        ?>
                         <div class="margin-bottom-30">
                            <h4>BOOK YOUR APPOINTMENT</h4>
                            <div class="border-style-2 margin-bottom-30"></div>

                            <div class="col-md-6">
                     <?php

 
$query = $pdo->prepare("SELECT * FROM doctoravailability WHERE DoctorId = :did");
$query->bindParam("did",$iid,PDO::PARAM_INT);
$query->execute();
$rows = $query->fetchAll(PDO::FETCH_ASSOC);


 if (isset($_POST['insertapp'])) {

    
$d = $_POST['appday'];
$timestamp = strtotime($d);
$day = date("D", $timestamp);

    if($day == $rows['day'] ){
        $query = $pdo->prepare("Insert into appointments (Date,DoctorId,PatientId,Day) values(:Date, :DoctorId, :PatientId,:Day)");
     
     

    $query->bindparam("Date", $_POST['appday'], PDO::PARAM_STR);
    $query->bindparam("Day", $day, PDO::PARAM_STR);
    $query->bindparam("DoctorId", $iid , PDO::PARAM_INT);
    $query->bindparam("PatientId", $_SESSION['id'] , PDO::PARAM_INT);
    
    $query->execute();

    // header("location: Index.php");

      }
      
    else {
        $error = "Doctor Not Availble on your selected Day..!";
    
    
}
 }

                     ?>
                        <?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
 
 ?>

<?php if (isset($_SESSION['utid']) && $_SESSION['utid'] == 3) { ?>

                        <form class="form" method="post" action="" >
                        <div class="row">
                  <div class="col-md-12">
              <?php if ($error!="") { ?>
                <div class="row alert alert-danger">
                  <?php echo $error; ?>
                </div>
                </div>
                </div>
              <?php } ?>
                           
                             <div class="col-md-12">
                             <input type="date"  class="form-control" name="appday" required></input>
                             </div>
                            
                            
                           
                           <div class="col-md-12">
                                    <button class="btn btn-theme" name="insertapp" type="submit">ADD APPOINTMENT</button>
                                </div>

                        </form>
                        
                        <?php }


                         else { ?>  
                                
                            <p style="font-weight: bold;">For Appointment You Need to login or Register Yourself First</p>  
                            <button class="btn btn-theme" ><a href="login.php">CLick here</a></button>
                        
                            <?php } ?>
                    </div>

                            <!-- <button type="button" style="background-color: #00B092;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Get Appointment</button> -->



                        </div>

                        <!-- <div class="margin-bottom-30">
                            <h4>CERTIFICATIONS</h4>
                            <div class="border-style-2 margin-bottom-30"></div>
                            <ul class="list-style margin-left-10">
                                <li><i class="fa fa-angle-right margin-right-10"></i> Surgical or internal medicine</li>
                                <li><i class="fa fa-angle-right margin-right-10"></i> Age range of patients</li>
                                <li><i class="fa fa-angle-right margin-right-10"></i> Diagnostic or therapeutic</li>
                                <li><i class="fa fa-angle-right margin-right-10"></i> Organ-based or technique-based</li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Team end -->



<?php include 'footer.php'; ?>
