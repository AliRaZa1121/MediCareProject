<?php
include 'header.php';

include("dbconnection.php");

$query = $pdo->prepare("SELECT products.*,productcategories.Name as CateName from products
JOIN productcategories on productcategories.id = products.CategoryId where products.Id =".$_GET['id']);
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
          <div class="col-md-4">

          <div class="blog-item">
                <div class="image-area">
                    <div class="blog-img"><a href="#"><img src="../uploading/<?php echo $row['Photo'] ?>" alt=""></a></div>
                </div>
          </div>
          </div>
          <div class="col-md-6">
                <div class="blog-content">

                    <h4><?php echo $row['Name'] ?></h4>
                    <a href="#"><h6 class="color-defult text-lowercase"><?php echo $row['CateName']?></h6></a>
                    <hr>
                    <div class="blog-date margin-bottom-20 margin-top-30">
                        <h3>$ <?php echo $row['Price'] ?><sub>/Only</sub></h3>
                    </div>
                    <hr>
                   <div class="text-body" style="height: 135px; width: 100%;">
                    <p  style="margin-left: 30px;"><?php echo $row['Details']?>.</p>
                    </div>
                    <div class="quantity">
                        <form action="" method="post">
                        <label>Quantity</label>
                        
                    <input style="width: 50px;" class="text-center" name="quantity" disabled type="number" value="1">
                        </form>
							</div>
					
    <div class="col-sm-4">
                    <a href="cart.php?id=<?php echo$row['Id']?>&price=<?php echo $row['Price'] ?>&quantity=1"  class="btn btn-simple" style="width: 100%;">Add to Cart</a>
    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- SHOPING CART AREA END -->
    <?php include 'footer.php'?>

    <style>

/*--quantity-starts--*/
.quantity{
	margin: 1.5em 0;
	float:left;
}
 /* .value-minus,
.value-plus{
    height: 40px;
    line-height: 24px;
    width: 40px;
    margin-right: 3px;
    display: inline-block;
    cursor: pointer;
    position: relative;
    font-size: 18px;
    color: #fff;
    text-align: center;
    -webkit-user-select: none;
    -moz-user-select: none;
	border:1px solid #b2b2b2;
	    vertical-align: bottom;
}
.quantity-select .entry.value-minus:before,
.quantity-select .entry.value-plus:before{
	content: "";
	width: 13px;
	height: 2px;
	background: #000;
	left: 50%;
	margin-left: -7px;
	top: 50%;
	margin-top: -0.5px;
	position: absolute;
}
.quantity-select .entry.value-plus:after{
	content: "";
	height: 13px;
	width: 2px;
	background: #000;
	left: 50%;
	margin-left: -1.4px;
    top: 50%;
    margin-top: -6.2px;
	position: absolute;
}
.value  {
    cursor: default;
    width: 40px;
	height:40px;
    padding: 8px 0px;
    color: #A9A9A9;
    line-height: 24px;
    border: 1px solid #E5E5E5;
    background-color: #E5E5E5;
    text-align: center;
    display: inline-block;
	margin-right: 3px;
}
.quantity-select .entry.value-minus:hover,
 .quantity-select .entry.value-plus:hover{
	background: #E5E5E5;
}

.quantity-select .entry.value-minus{
    margin-left: 0;
} */
/*--quantity-end--*/
    </style>