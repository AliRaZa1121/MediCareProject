
<?php

include("dbconnection.php");

$query = $pdo->prepare("Select * from products where Id = :id");
$query->bindparam("id",$_GET['id'],PDO::PARAM_INT); 
$query->execute();

$row = $query->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit']))
{
    if($_FILES['photo']['name'] != "")
    {
      move_uploaded_file($_FILES['photo']['tmp_name'],'uploading/'.$_FILES['photo']['name']);
    }
    
$query = $pdo->prepare("update products SET Name = :name, Price=:price,CategoryId=:categoryid,Details=:details,Photo=:photo where id = :id");
$query->bindparam("id",$_POST['id'],PDO::PARAM_INT);
$query->bindparam("name",$_POST['name'],PDO::PARAM_STR);
$query->bindparam("price",$_POST['price'],PDO::PARAM_INT);
$query->bindparam("details",$_POST['details'],PDO::PARAM_STR);
$query->bindparam("categoryid",$_POST['categoryid'],PDO::PARAM_STR);

if($_FILES['photo']['name'] != ""){
    $query->bindparam("photo",$_FILES['photo']['name'],PDO::PARAM_STR);
    }
    else{
    $query->bindparam("photo",$_POST['PhotoLastUploaded'],PDO::PARAM_STR);
    }
    

$query->execute();

header("location: products.php");

}

?>


<?php include("header.php"); ?>

<style media="screen">
.label2{
  padding: 10px;
  background: red;
  display: table;
  color: #fff;
   }
.input[type="file"] {
  display: none;
}
</style>


<div class="container">

  <form class="form" action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <input type="hidden" name="id" value="<?php echo $row['Id'] ?>">
            </div>

            <div class="form-group">
              <label for="">Name</label>
              <input type="text"class="form-control" name="name"  value="<?php echo $row['Name'] ?>">
           </div>

           <div class="form-group">
             <label for="">Short Discription</label>
             <input type="number"class="form-control" name="price"  value="<?php echo $row['Price'] ?>">
           </div>

          <div class="form-group">
          <label for="">Details</label>
          <textarea class="form-control" name="details" rows="8" cols="80"  ><?php echo $row['Details'] ?></textarea>
        </div>

        <div class="form-group">
              <label for="">Product Category</label>
              <select class="form-control" name="categoryid">
              <?php
      				 $query = $pdo->query("select * from productcategories");
      		 	 	 $records = $query->fetchAll(PDO::FETCH_ASSOC);
      		 	 	 foreach ($records as $item) {
      		 	 	 	$k = "";
      		 	 	 	if ($row['CategoryId'] == $item['Id']) {
      		 	 	 		$k = ' selected ';
      		 	 	 	}
      		 	 	 	?>
      		 	 	 		<option <?php echo $k ?> value='<?php echo $item['Id']; ?>'><?php echo $item['Name']; ?></option>
      		 	 	 	<?php
      		 	 	 	}
      		 	 	 ?>
              </select>
          </div>

          
          
           <div class="row">
           <div class="col-md-10">
              <div class="form-group">
                <label >Change Image</label>
                <input type="file" class="form-control" name="photo">
                <input type="hidden" name="PhotoLastUploaded" value="../uploading/<?php echo $row['Photo'] ?>">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
              <img src="uploading/<?php echo $row['Photo'] ?>" width="130px" height="130px" style="border-radius:100px;border:1px solid #4e73df;">
              </div>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-outline-success" name="submit" value="Save Changes">
            </div>

          </div>
          </form>

</div>

<?php include("footer.php"); ?>
