<?php

include 'header.php';

include("dbconnection.php");

$pid = $_SESSION['id'];

if(isset($_POST['submit']))
{
$query = $pdo->prepare("UPDATE patients SET Name = :name,Contact=:contact WHERE id=:id");
$query->bindparam("id",$_POST['id'],PDO::PARAM_INT);
$query->bindparam("name",$_POST['name'],PDO::PARAM_STR);
$query->bindparam("contact",$_POST['contact'],PDO::PARAM_STR);
$query->execute();

$query = $pdo->prepare("UPDATE users SET Email=:email,Password=:password WHERE id=:id");
$query->bindparam("id",$_POST['id'],PDO::PARAM_INT);
$query->bindparam("email",$_POST['email'],PDO::PARAM_STR);
$query->bindparam("password",$_POST['password'],PDO::PARAM_STR);
$query->execute();

// header("location: patientsprofile.php");

}


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
<?php

        $query = $pdo->prepare("SELECT patients.*,users.Email, users.password FROM patients JOIN users ON users.id = patients.id WHERE patients.Id=:id");
        $query->bindparam("id",$pid,PDO::PARAM_INT);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
 ?>

            <div class="col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane active" >
                            <div class="panel panel-info panel-border">
                                <div class="panel-heading panel-bg">EDIT PROFILE</div>
                                    <div class="panel-body">
                                      <form class="form" action="" method="post">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" value="<?php echo $row['Id'] ?>"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12"><strong>Name:</strong></div>
                                            <div class="col-md-12">
                                                <input type="text" name="name" class="form-control" value="<?php echo $row['Name'] ?>"/>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                              <div class="col-md-12"><strong>Email:</strong></div>
                                              <div class="col-md-12">
                                                  <input type="email" name="email" class="form-control" value="<?php echo $row['Email'] ?>"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-md-12"><strong>Password:</strong></div>
                                              <div class="col-md-12">
                                                  <input type="text" name="password" class="form-control" value="<?php echo $row['password'] ?>"/>
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-md-12"><strong>Contact:</strong></div>
                                              <div class="col-md-12">
                                                  <input type="text" name="contact" class="form-control" value="<?php echo $row['Contact'] ?>"/>
                                              </div>
                                          </div>
                                          
                                          
                                          <div class="form-group">
                                              <div class="col-md-12">
                                                  <button type="submit" class="btn btn-theme btn-block" name="submit">Save and continue</button>
                                              </div>
                                          </div>
                                      </form>


                            </div>
                        </div>

                        <div class="clearfix"></div>
                    </div>
            </div>



            <div class="col-md-2"></div>
       </div>
    </div>
</section>

<?php include 'footer.php'; ?>
