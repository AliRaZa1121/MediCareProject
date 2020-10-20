<?php

include 'header.php';

include("dbconnection.php");

$msg = "";

if (isset($_POST['submit'])) {
    $query = $pdo->prepare("select * from users where Email =:email");
    $query->bindParam("email",$_POST['email'],PDO::PARAM_STR);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);

    $pas = $row['Password'];

    $headers = "Content-Type: text/html; charset=UTF-8";
    $body = "<html>
    <body>
    <h1>Hello</h1> </br>
    <p>
    Your Passwrod has been recoverd succesfully & your password is <span></span>". $pas ."
    </p>
    </body>
    </html>";


      $mail = mail($_POST['email'],"Password Recover", $body, $headers);

      $msg = "Check Your Email For Your Recoverd Password";


}


?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>


            <div class="col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane active" >
                            <div class="panel panel-info panel-border">
                                <div class="panel-heading panel-bg">Recover Your Password</div>
                                    <div class="panel-body">
                                      <form class="form" action="" method="post">
                                      <div class="row">
                  <div class="col-md-12">
              <?php if ($msg!="") { ?>
                <div class="alert-success"style="text-align: center;">
                  <?php echo $msg;
              }
                  ?>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" value="<?php echo $row['Id'] ?>"/>
                                            </div>
                                        </div>
                                      
                                          <div class="form-group">
                                              <div class="col-md-12"><strong>Your Email:</strong></div>
                                              <div class="col-md-12">
                                                  <input type="text" name="email" class="form-control"/>
                                              </div>
                                          </div>
                                          
                                          
                                          <div class="form-group">
                                              <div class="col-md-12">
                                                  <button type="submit" class="btn btn-theme btn-block" name="submit">Find Password</button>
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
