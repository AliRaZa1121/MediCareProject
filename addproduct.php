<?php

include("dbconnection.php");

if(isset($_POST['submit']))
{

move_uploaded_file($_FILES['photo']["tmp_name"],'uploading/'.$_FILES['photo']["name"]);

  $sql = "insert into products(Name,Price,CategoryId,Photo,Details) values(:name,:price,:categoryid,:photo,:details)";
  $query = $pdo->prepare($sql);
  $query->bindparam("name",$_POST['name'],PDO::PARAM_STR);
  $query->bindparam("details",$_POST['details'],PDO::PARAM_STR);
  $query->bindparam("price",$_POST['price'],PDO::PARAM_STR);
  $query->bindparam("categoryid",$_POST['categoryid'],PDO::PARAM_STR);
  $query->bindparam("photo",$_FILES['photo']['name'],PDO::PARAM_STR);
  $query->execute();

  header("location: products.php");
}

include("header.php");

?>


<div class="container">

  <form class="form" action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label for="">Name</label>
              <input type="text"class="form-control" name="name">
           </div>

           <div class="form-group">
             <label for="">Price</label>
             <input type="number"class="form-control" name="price">
          </div>

          <div class="form-group">
              <label for="">Details</label>
              <input type="text"class="form-control" name="details">
           </div>

          <div class="form-group">
            <label for="">Category</label>
            <select class="form-control" name="categoryid">
              <?php
              $query = $pdo->query("Select * from productcategories");
              $rows = $query->fetchAll(PDO::FETCH_ASSOC);
              foreach ($rows as $row):
              ?>
                <option value="<?php echo $row['Id'] ?>"><?php echo $row['Name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>


        <div class="form-group">
          <label for="">Photo</label>
          <input type="file" class="form-control" name="photo">
       </div>


            <div class="form-group">
              <input type="submit" class="btn btn-primary" name="submit" value="Add Product">
            </div>

          </form>

</div>


<?php include("Footer.php"); ?>
