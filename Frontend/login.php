<?php
include 'dbconnection.php';

$msg = "";
$msg1 ="";
$error = "";
$error1 = "";
if(isset($_POST['btnlogin']))
{
    $query = $pdo->prepare("SELECT users.*,doctors.Name,doctors.Photo from users
    LEFT JOIN doctors on doctors.id = users.id
    where email=:email and password=:password");
    //$query->bindparam("uid",$_POST['uid'],PDO::PARAM_INT);
    $query->bindparam("email",$_POST['email'],PDO::PARAM_STR);
    $query->bindparam("password",$_POST['password'],PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if($user!=null)
      {
        session_start();
        $_SESSION['id'] = $user['Id'];
        $_SESSION['utid'] = $user['UserTypeId'];
        $_SESSION['name'] = $user['Name'];
        $_SESSION['photo'] = $user['Photo'];

        if ($user['UserTypeId'] == 1) {
          header("location: ../index.php");
        }
        else if ($user['UserTypeId'] == 2) {
          header("location: ../index.php");
        }
        else if ($user['UserTypeId'] == 3) {
          header("location: index.php");
        }
      }
    else{
      $msg = "Please enter correct email or password.";
    }
}

if(isset($_POST['btnregister']))
{

    $query = $pdo->query("SELECT * from users ");
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);

    $emails = "";
    $postemail = $_POST['email'];
    
   foreach ($rows as $row) {
       if ($postemail == $row['Email']) {
        $emails = "1";
       break;
 
       }
   
   }

   if($_POST['password'] != $_POST['confirmpassword'] ){
    $error = "Confirm Password Doesn't Match..!";
  }

  elseif($emails > 0) {
    $error1 = "This Email Address already consist"; 
  }

   else {
   
    $utid = 3;
    $query = $pdo->prepare("insert into users(Email,Password,UserTypeId) values(:email,:password,:usertypeid)");
    $query->bindparam("email",$_POST['email'],PDO::PARAM_STR);
    $query->bindparam("password",$_POST['password'],PDO::PARAM_STR);
    $query->bindparam("usertypeid",$utid,PDO::PARAM_INT);
    $query->execute();

    $id = $pdo->lastInsertId();

    $query = $pdo->prepare("insert into patients(Id,Name,Contact) values(:id,:name,:contact)");
    $query->bindparam("id",$id,PDO::PARAM_INT);
    $query->bindparam("name",$_POST['name'],PDO::PARAM_STR);
    $query->bindparam("contact",$_POST['contact'],PDO::PARAM_STR);
    $query->execute();

        
    
     $msg1= "Your Account has been registered..!! Please Login Now..";
     
   }

 


}

?>

<?php include 'header.php'; ?>

    <section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>LOGIN/REGISTER</h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">LOGIN/REGISTER</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <hr>

    <section>
        <div class="container padding-bottom-80">
            <div class="section-content">

              <div class="row">
                  <div class="col-md-12">
              <?php if ($msg!="") { ?>
                <div class="row alert alert-danger"style="text-align: center;">
                  <?php echo $msg; ?>
                </div>
                </div>
                </div>
              <?php } ?>

              <div class="row">
                  <div class="col-md-12">
              <?php if ($msg1!="") { ?>
                <div class="row alert alert-success" style="text-align: center;">
                  <?php echo $msg1; ?>
                </div>
                </div>
                </div>
              <?php } ?>

              <div class="row">
                  <div class="col-md-12">
              <?php if ($error1!="") { ?>
                <div class="row alert alert-danger"style="text-align: center;">
                  <?php echo $error1; ?>
                </div>
                </div>
                </div>
              <?php } ?>

              <div class="row">
                  <div class="col-md-12">
              <?php if ($error!="") { ?>
                <div class="row alert alert-danger"style="text-align: center;">
                  <?php echo $error; ?>
                </div>
                </div>
                </div>
              <?php } ?>

                <div class="row">
                    <div class="col-md-6">
                      <div class="section-title margin-left-20 ">
                            <h6>Get in Touch</h6>
                            <h2>LOGIN</h2>
                            <div class="small-line-border-2"></div>
                        </div>
                        <form class="form" method="post" action="" name="loginform">
                          <div class="col-md-12">
                              <input type="hidden" name="uid" value="">
                          </div>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                            </div>
                            <div class="col-md-12">
                                <input type="password" name="password" class="form-control" placeholder="Enter Your Password" required >
                            </div>
                            <!-- <div class="col-md-12" style="margin-bottom: 10px;">
                           <a href="forgotpassword.php">Forgot Password?</a>     
                           </div>
                             -->
                            <div class="col-md-12">
                                <div class="contact-textarea">
                                    <button class="btn btn-theme" name="btnlogin" type="submit">LOGIN</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="section-title margin-left-20 ">
                            <h6>Get In Touch</h6>
                            <h2>REGISTER</h2>
                            <div class="small-line-border-2"></div>
                        </div>
                        <form class="form" method="post" action="" name="registerationform">
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Enter Email"  required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="contact" class="form-control" placeholder="Enter Contact No." pattern="03[0-9]{9}" required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password " required>
                            </div>
                            <div class="col-md-12">
                                    <button class="btn btn-theme" name="btnregister" type="submit">REGISTER</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <!-- service start -->
 <section class="service-area contact-info">
        <div class="container padding-bottom-none">
            <div class="section-content">
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="service-item style-1 bg-f8">
                            <div class="service-icon">
                                <i class="fa fa-map-pin"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#" class="color-333">Contact Info</a></h5>
                                <p>5B Streat, City 50987 New Town US, <br>Khulna, BD</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="service-item style-1 bg-f8">
                            <div class="">
                                <i class="fa fa-history"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#" class="color-333">Business Hours</a></h5>
                                <p>Monday-Friday: 10am to 8pm <br>Saturday: 11am to 3pm</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="service-item style-1 bg-f8">
                            <div class="">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="content">
                                <h5><a href="#" class="color-333">Email</a></h5>
                                <p>info@bdcoder.com <br> set-info@bdcoder.com </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service end -->
<?php include 'footer.php'; ?>
