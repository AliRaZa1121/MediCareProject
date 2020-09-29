
<?php include 'header.php'; ?>

<?php

if(isset($_POST['submit']))
{
  $query = $pdo->prepare("INSERT INTO appointments(PatientId,DoctorId,Day,Timings) VALUES(:ptid,:dtid,:day,:timings)");
  $query->bindparam("ptid",$_SESSION['pid'],PDO::PARAM_INT);
  $query->bindparam("dtid",$_POST['doctorid'],PDO::PARAM_INT);
  $query->bindparam("day",$_POST['day'],PDO::PARAM_STR);
  $query->bindparam("timings",$_POST['timings'],PDO::PARAM_STR);
  $query->execute();

  header("location: viewappointments.php");
}




?>

<!-- appointment start -->
<section class=" animatedParent animateOnce">
    <div class="container padding-bottom-none">
        <div class="section-content">
            <div class="row">
                <div class="col-md-6">
                    <img class="animated fadeInLeftShort slow delay-500 booking-cantact-img" src="img/bg/c1.png" alt="">
                </div>
                <div class="col-md-6 bg-f8 padding-tb margin-bottom-80 animated fadeInRightShort slow delay-500">
                    <div class="booking-from">
                        <h2>Make An <span class="color-defult">Appointment</span></h2>
                        <div class="border-style-2 margin-bottom-30"></div>
                        <p class="margin-bottom-30">Consectetur adipisicing elit. Id dignissimos atque debitis esse possimus, <br>fuga tenetur rem et. Vitae, repudiandae.</p>
                        <form  method="post" action="">
                            <div class="row">

                              <div class="col-md-12">
                                      <input type="hidden" name="patientid" value="<?php echo $_SESSION['pid'] ?>">
                              </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <select class="form-control" name="doctorid">
                                      <option value="" disabled selected>Select Doctor</option>
                                      <?php
                                      //$did = $row['Id'];
                                      $query = $pdo->query("Select * from doctors");
                                      //$query->bindparam("did",$did,PDO::PARAM_INT);
                                      //$query->execute();
                                      $rows = $query->fetchAll(PDO::FETCH_ASSOC);
                                      foreach ($rows as $row): ?>
                                        <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <select class="form-control" name="day">
                                      <option value="" disabled selected>Select Day</option>
                                      <?php

                                      //$sid = $row['Id'];
                                      $query = $pdo->query("Select Day from doctoravailability where DoctorId=". $row['Id']);
                                      //$query->bindparam("id",$sid,PDO::PARAM_INT);
                                      //$query->execute();
                                      $drows = $query->fetchAll(PDO::FETCH_ASSOC);
                                      foreach ($drows as $drow): ?>
                                        <option><?php echo $drow['Day'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="form-group">
                                    <select class="form-control" name="timings">
                                      <option value="" disabled selected>Select Timings</option>
                                      <?php
                                      //$sid = $row['Id'];
                                      $query = $pdo->query("Select FromTime,EndTime from doctoravailability where DoctorId=". $row['Id']);

                                      //$query->bindparam("id",$sid,PDO::PARAM_INT);
                                      //$query->execute();
                                      $drows = $query->fetchAll(PDO::FETCH_ASSOC);
                                      foreach ($drows as $drow): ?>
                                        <option><?php echo $drow['FromTime'] ?> - <?php echo $drow['EndTime'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="contact-textarea">
                                        <button class="btn btn-theme" type="submit" value="Submit Form" name="submit">BOOK APPOINTMENT</button>
                                    </div>
                                </div>
                                <div id="form-messages"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- appointment end -->

<?php include 'footer.php'; ?>
