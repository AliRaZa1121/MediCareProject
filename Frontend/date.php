<!-- <?php
$conn = "mysql:host=localhost;dbname=care";
$user = "root";
$password = "";
$pdo = new PDO($conn,$user,$password);
$exec = $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// $id = 14;

// $query = $pdo->prepare("SELECT * FROM doctoravailability WHERE DoctorId=:id");
// $query->bindParam("id",$id,PDO::PARAM_INT);
// $query->execute();

// $rows = $query->fetchAll(PDO::FETCH_ASSOC);

// echo $rows;

// $rows = $query->fetch(PDO::FETCH_ASSOC);

    //  $time = $rows['FromTime'];
    //  $timestamp = strtotime($time);
    //  echo date("g:ia", $timestamp);

    // $date = $rows['Date'];
    // $timestamp = strtotime($date);
    // echo date("D", $timestamp);

//     $query = $pdo->query("SELECT * from users ");
//     $rows = $query->fetchAll(PDO::FETCH_ASSOC);

//     $emails = false;
//    foreach ($rows as $row) {
//        if ($_POST['email'] == $row) {
//         $emails = true;
//        break; 
//        $error1 = "This Email Address already consist";
//        }
   
//    }
// if(isset($_POST['btn']))
// {

    $query = $pdo->query("SELECT * from users ");
    $rows = $query->fetchAll(PDO::FETCH_ASSOC);


    // $postemail = $_POST['email'];
    foreach ($rows as $row) {
       echo $row['Email'];
    }
//    foreach ($rows as $row) {
//        if ($postemail == $row['Email']) {
//        echo "Match" ;
//     }
//  else{
//      echo "Welcome";
//  }
       

   
   
?>
<form class="form" method="post" action="" name="form">
                        
       <div class="col-md-12">
       <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
   </div>
   <button class="btn btn-theme" name="btn" type="submit">LOGIN</button>
                            
</form>
   
   


   
     -->