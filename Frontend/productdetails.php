<?php
include 'header.php'; 

include("dbconnection.php");

$query = $pdo->prepare("SELECT * from products where products.Id =".$_GET['proid']);
$query->execute();
                  
$row = $query->fetch(PDO::FETCH_ASSOC);


?>
<section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Shop </h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Shop </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SHOPING CART AREA START -->
    <section class="shoping-cart-area bg-f8">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <div class="blog-item">
                <div class="blog-images">
                    <div class="blog-img"><a href="#"><img src="../uploading/<?php echo $row['Photo'] ?>" alt=""></a></div>
                </div>
                <div class="blog-content">
                    <a href="#"><h4><?php echo $row['Name'] ?></h4></a>
                    <!-- <a href="#"><h6 class="color-defult text-lowercase"></h6></a>
                    <div class="blog-date margin-bottom-20 margin-top-30"> -->
                        <h3>$ <?php echo $row['Price'] ?><sub>/Only</sub></h3>
                    </div>
                   
                    <p style="text-align: center;"><?php echo $row['Details']?>.</p>
                    <a href="#"  class="btn btn-simple" style="width: 100%;">Add to Cart</a>
                    
                </div>
            </div>
          </div>
        </div>  
      </div>
    </section>
    <!-- SHOPING CART AREA END -->
    <?php include 'footer.php'?>