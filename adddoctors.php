<?php

include("dbconnection.php");

if(isset($_POST['submit']))
{

move_uploaded_file($_FILES['photo']["tmp_name"],'uploading/'.$_FILES['photo']["name"]);

  $usertypeid = 2;
  $ranpassword = rand(1000,100000);
  $sql = "insert into users(Email,Password,UserTypeId) values(:email,:password,:usertypeid)";
  $query = $pdo->prepare($sql);
  $query->bindparam("email",$_POST['email'],PDO::PARAM_STR);
  $query->bindparam("password",$ranpassword,PDO::PARAM_STR);
  $query->bindparam("usertypeid",$usertypeid,PDO::PARAM_STR);
  $query->execute();
  $id = $pdo->lastInsertId();

  $sql = "insert into doctors(Id,Name,Contact,Details,SpecialityId,CityId,Photo) values(:id,:name,:contact,:details,:speciality,:city,:photo)";
  $query = $pdo->prepare($sql);
  $query->bindparam("id",$id,PDO::PARAM_STR);
  $query->bindparam("name",$_POST['name'],PDO::PARAM_STR);
  $query->bindparam("contact",$_POST['contact'],PDO::PARAM_STR);
  $query->bindparam("details",$_POST['details'],PDO::PARAM_STR);
  $query->bindparam("speciality",$_POST['speciality'],PDO::PARAM_STR);
  $query->bindparam("city",$_POST['city'],PDO::PARAM_STR);
  $query->bindparam("photo",$_FILES['photo']['name'],PDO::PARAM_STR);
  $query->execute();

                  $headers = "Content-Type: text/html; charset=UTF-8";
                  $body = "<html>
                  <body>
                  <h1>Hello <span></span>". $_POST['name'] ."</h1> </br>
                  <p>
                  My name is Salman and I am Assistant Director & Admin of
                  Medicative Hospital Website
                  On behalf of all my colleagues,
                  I wanted to wish you a warm welcome to the medical register and to your career as doctors,
                  to say thank you,
                  and to wish you well for your first days,
                  weeks and beyond.
                  </p> </br>
                  <p>You have to Login on your Dashboard and Edit your Profile nicely..!</p> </br>
                  <p>Here is Your Dashboard Password</p> <span></span> <h3>". $ranpassword ."</h3>
                  </body>
                  </html>";


                    $mail = mail($_POST['email'],"Confirmation Email", $body, $headers);

  header("location: doctors.php");
}

include("header.php");

?>

              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ADD NEW DOCTORS</h6>
              </div>

<hr>

<div class="container">

  <form class="form" action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="">Name</label>
              <input type="text"class="form-control" name="name">
           </div>

           <div class="form-group">
             <label for="">Email</label>
             <input type="email"class="form-control" name="email">
          </div>

           <div class="form-group">
                 <label for="">Contact</label>
                 <input type="number" class="form-control" name="contact" pattern="03[0-9]{9}">
              </div>


          <div class="form-group">
            <label for="">Speciality</label>
            <select class="form-control" name="speciality">
              <?php
              $query = $pdo->query("Select * from specialities");
              $rows = $query->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $row):
              ?>
                <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="">City</label>
            <select class="form-control" name="city">
              <?php
              $query = $pdo->query("Select * from cities");
              $crows = $query->fetchAll(PDO::FETCH_ASSOC);
              foreach ($crows as $crow):
              ?>
                <option value="<?php echo $crow['Id'] ?>"><?php echo $crow['Name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

        <div class="form-group">
          <label for="">Details</label>
          <textarea class="form-control" name="details" rows="8" cols="80"></textarea>
        </div>

        <div class="form-group">
          <label for="">Photo</label>
          <input type="file" class="form-control" name="photo">
       </div>


            <div class="form-group">
              <input type="submit" class="btn btn-outline-success" name="submit" value="Add Doctor">
            </div>

          </form>

</div>


<?php include("Footer.php"); ?>
