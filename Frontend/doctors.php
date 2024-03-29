<?php include 'header.php'; 
?>


    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Doctors</h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Our Doctor</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
if (isset($_POST['btnsearch'])) {
    $query = $pdo->prepare("SELECT doctors.*,cities.Name as CityName,specialities.Name as SpecName from doctors
    JOIN cities ON doctors.CityId = cities.Id JOIN specialities on specialities.id = doctors.SpecialityId
    where cities.Name=:city and specialities.Name=:speciality");
    $query->bindparam("city",$_POST['city'], PDO::PARAM_STR);
    $query->bindparam("speciality",$_POST['speciality'], PDO::PARAM_STR); 
    $query->execute();
    $rows = $query->fetch(PDO::FETCH_ASSOC);
                              
}
    ?>

   
<div class="form-group" style="height: 70px; width: 100%; margin-left: 200px;">

<form class="form-group" action="" method="POST" style="margin-left: 300px ; margin-top: 50px;">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>
$(document).ready(function() {
    $('#doctorcity').on('change', function() {
        
        $.get("city.php?cid="+this.value+"", function(data){
            $("#doctorsgrid").empty().append(data);
            $("#doctorsgrid").html(data);
            
            
  });
    });
});
</script>

                            
                            <div class="col-md-3">
                                <select id="doctorcity" name="city" class="form-control" >
                              <option value="">Select City</option>
                                <?php
                                $query = $pdo->query("Select * from cities");
                                $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row): ?>
                                <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>


<script>

$(document).ready(function() {
    $('#doctorspec').on('change', function() {
        
        $.get("speciality.php?sid="+this.value+"", function(data){
            $("#doctorsgrid").empty().append(data);
            $("#doctorsgird").html(data);
            
  });
    });
});

</script>
                           
                           <div class="col-md-3">
                                <select id="doctorspec" name="speciality" class="form-control" >
                              <option value="" >Select Doctor Speciality</option>
                                <?php
                                $query = $pdo->query("Select * from specialities");
                                $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($rows as $row): ?>
                                <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            
                        
</form>

</div>
<hr>
    <!-- Team start -->
    <section class="team-area">
        <div class="container">
            <div id="doctorsgrid" class="section-content">
                <div class="row">

                  <?php

                  include 'dbconnection.php';
                  $query = $pdo->query("SELECT doctors.*,specialities.name as SpecName, cities.name as CityName  from doctors
                                        JOIN specialities on specialities.id = doctors.SpecialityId
                                        Join cities on cities.id = doctors.cityid");
                  $rows = $query->fetchAll(PDO::FETCH_ASSOC);

                  if (count($rows)>0) {
                  foreach ($rows as $row): ?>

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
                        <div class="team-content" style="width: 400px;">
                            <h4><a href="#"><?php echo $row['Name'] ?></a></h4>
                            <h6><?php echo $row['SpecName'] ?></h6>
                            <h6><?php echo $row['CityName'] ?></h6>
                        </div>
                        <div class="timetable"style="width: 400px;" >
                            
                            <a href="doctordetails.php?iid=<?php echo $row['Id'] ?>" class="btn-theme text-center btn-block"> Request A​n Appointment​​​</a>
                        </div>
                    </div>
                  </div>

                  <?php endforeach; ?>

<?php }

else { ?>
  <div class="col-md-12">
    <h1  class="alert-danger text-center" >No Doctor found</h1>
  </div>
<?php } ?>


                </div>
            </div>
        </div>
    </section>
    <!-- Team end -->

<?php include 'footer.php'; ?>


