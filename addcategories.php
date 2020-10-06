<?php

include("dbconnection.php");

if(isset($_POST['submit']))
{
  $query = $pdo->prepare("insert into productcategories(Name) values(:name)");
  $query->bindparam("name",$_POST['name'],PDO::PARAM_STR);
  $query->execute();
  header("location: categories.php");
}

include("header.php");

?>

<div class="container">

  <form class="form" method="post">

           <div class="form-group">
             <label for="">Product Categories Name</label>
             <input type="text" class="form-control" name="name">
           </div>

            <div class="form-group">
              <input type="submit" class="btn btn-primary" name="submit" value="Insert">
            </div>

  </form>

</div>

<?php include("Footer.php"); ?>
