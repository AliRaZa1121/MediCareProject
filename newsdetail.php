<?php

include("dbconnection.php");


$query = $pdo->prepare("Select * from news where Id = :id");
$query->bindparam("id",$_GET['nid'],PDO::PARAM_INT); 
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);

?>

<?php include("header.php"); ?>


<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['Title']?></h6>
                </div>
                <div class="card-body">
                    <h4>Short Discription:</h4>
                 <p style="font-style: italic; font-weight: 700;"><?php echo $row['ShortDiscription'] ?></p>
                 <hr>
                 <h4>Main Content:</h4>
                 <p style="font-weight: 500;"><?php echo $row['Content'] ?></p> 
                 </div>
              </div>


             
              <?php include("footer.php"); ?>
