<?php include 'header.php'; ?>


    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>SELECT Doctor</h3>
                        <p><a href="index-one.html">Doctors</a> <span class="fa fa-angle-right"></span> <a href="#">Search Doctor</a></p>
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

                  <?php

                  include 'dbconnection.php';

                  $sql = "SELECT doctors.*,specialities.name as SpecName from doctors
                                        JOIN specialities on specialities.id = doctors.SpecialityId
                                        WHERE 1=1 ";

                  if ($_POST['speciality'] != "") {
                      $sql .= " and  doctors.SpecialityId=" . $_POST['speciality'] ;
                  }

                  if ($_GET['city'] != "") {
                      $sql .= "   AND doctors.CityId=" . $_GET['city'] ;
                  }

                  if ($_GET['keyword'] != "") {
                      $sql .= "   AND doctors.Name like '%" . $_GET['keyword'] . "'%" ;
                  }

                  $query = $pdo->query($sql);
                  //$k = "%" . $_GET['keyword'] . "%";
                  //$query->bindparam("specid",$_GET['speciality'],PDO::PARAM_INT);
                  //$query->bindparam("citid",$_GET['city'],PDO::PARAM_INT);
                  //$query->bindvalue("keyword",$k);
                  //$query->execute();
                  $rows = $query->fetchAll(PDO::FETCH_ASSOC);

                  if (count($rows)>0) {
                  foreach ($rows as $row) { ?>

                  <div class="col-md-4">
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
                            <h4><a href="#"><?php echo $row['Name'] ?></a></h4>
                            <h6><?php echo $row['SpecName'] ?></h6>
                            <div class="team-content-icon">
                                <i class="fa fa-heart"></i>
                            </div>
                        </div>
                        <div class="timetable">
                            <div class="item">
                              <ul class="footer-list border-deshed">
                              <?php
                              $query = $pdo->prepare("SELECT * from doctoravailability where DoctorId=:did");
                              $query->bindparam("did",$row['Id'],PDO::PARAM_INT);
                              $query->execute();
                              $records = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($records as $item) { ?>
                                <li class="clearfix"> <span> <?php echo $item['Day'] ?> :  </span>
                                <div class="value pull-right"> <?php echo $item['FromTime'] ?> - <?php echo $item['EndTime'] ?> </div>
                              <?php } ?>
                              </li>
                              </ul>
                            </div>
                            <a href="doctordetails.php?id=<?php echo $row['Id'] ?>" class="btn-theme text-center btn-block"> View Profile</a>
                        </div>
                    </div>
                  </div>

                  <?php } ?>

                <?php }

                else { ?>
                  <div class="alert alert-danger">
                    No Result Found.
                  </div>
                <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Team end -->

<?php include 'footer.php'; ?>
