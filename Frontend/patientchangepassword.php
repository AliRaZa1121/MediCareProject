<?php

include 'header.php';

include("dbconnection.php");
$msg = "";
$error = "";
$pid = $_SESSION['id'];

if(isset($_POST['submit']))
{
    if($_POST['newpassword'] != $_POST['confirmpassword'] ){
        $error = "Confirm Password Doesn't Match..!";
      }
      else {
    
$query = $pdo->prepare("UPDATE users SET Password = :password WHERE id=:id");
$query->bindparam("id",$pid,PDO::PARAM_INT);
$query->bindparam("password",$_POST['password'],PDO::PARAM_STR);
$query->execute();

$msg = "Your Password Has been Changed..!!";
      }
}


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
<?php

 ?>

            <div class="col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane active" >
                            <div class="panel panel-info panel-border">
                                <div class="panel-heading panel-bg">Change Password</div>
                                    <div class="panel-body">
                                      <form class="form" action="" method="post">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" value="<?php echo $row['Id'] ?>"/>
                                            </div>
                                        </div>
                                          <div class="form-group">
                                              <div class="col-md-12"><strong>New Password:</strong></div>
                                              <div class="col-md-12">
                                                  <input type="password" name="newpassword" class="form-control" />
                                              </div>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-md-12"><strong>Confirm Password:</strong></div>
                                              <div class="col-md-12">
                                                  <input type="text" name="confirmpassword" class="form-control"/>
                                              </div>
                                          </div>
                                          
                                          
                                          <div class="form-group">
                                              <div class="col-md-12">
                                                  <button type="submit" class="btn btn-theme btn-block" name="submit">Save Changem</button>
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
