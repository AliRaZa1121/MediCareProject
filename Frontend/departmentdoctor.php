<?php include 'header.php'; 
$sid = $_GET['id'];

$query = $pdo->prepare("SELECT * from specialities where specialities.id =:id ");

                 $query->bindparam("id",$sid,PDO::PARAM_INT);
                 $query->execute();
                 $rows = $query->fetch(PDO::FETCH_ASSOC);
                 
?>


    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3><?php echo $rows['Name'] ?> Doctors</h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Our Doctor</a></p>
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
                  $query = $pdo->prepare("SELECT doctors.*,specialities.name as SpecName , specialities.Id as SpecId, cities.name as CityName  from doctors
                                        JOIN specialities on specialities.id = doctors.SpecialityId
                                        Join cities on cities.id = doctors.cityid where specialities.id =:id ");

                 $query->bindparam("id",$sid,PDO::PARAM_INT);
                 $query->execute();
                 $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                 if (count($rows)>0) {
                  foreach ($rows as $row) : ?>

                  <div class="col-md-4">
                    <div class="team-item-2">
                        <img style="height: 300px; width: 400px;" src="../uploading/<?php echo $row['Photo'] ?>" alt="">
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
                            <h6><?php echo $row['CityName'] ?></h6>
                        </div>
                        <div class="timetable">
                            
                            <a href="doctordetails.php?iid=<?php echo $row['Id'] ?>" class="btn-theme text-center btn-block"> Request A​n Appointment​​​</a>
                        </div>
                    </div>
                  </div>

                  
                  <?php endforeach; ?>

<?php }

else { ?>
  <div class="col-md-12">
    <h3  class="alert-danger text-center" > Doctors not found</h3>
  </div>
<?php } ?>

                </div>
            </div>
        </div>
    </section>
    <!-- Team end -->

<?php include 'footer.php'; ?>
