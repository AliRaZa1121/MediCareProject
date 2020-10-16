<?php
include("dbconnection.php");

session_start();
$sid = session_id();
$total = "0.00";



if (isset($_GET['id'])) {
  

  $query = $pdo->prepare("select count(*) from orders where SessionId =:sid");
  $query->bindParam("sid",$sid,PDO::PARAM_STR);
  $query->execute();

  $orders = $query->fetch(PDO::FETCH_NUM);

  if ($orders[0]== 0) {
    $query = $pdo->prepare("insert into Orders (SessionId,Amount,OrderDate) values(:SessionId,:Amount, NOW() )");
    $query->bindParam("SessionId",$sid,PDO::PARAM_STR);
    $query->bindParam("Amount",$total,PDO::PARAM_STR);

    date_default_timezone_set('Asia/karachi');
    $date = date('d/m/Y H:i:s');
    $query->execute();

    $orderid = $pdo->lastInsertId();

    $_SESSION['orderid'] = $orderid;

    $query = $pdo->prepare("insert into orderdetails (ProductId,OrderId,Price,Quantity) values(:ProductId,:OrderId,:Price,:Quantity) ");
    $query->bindParam("ProductId", $_GET['id'], PDO::PARAM_INT);
    $query->bindParam("OrderId", $orderid, PDO::PARAM_INT);
    $query->bindParam("Price", $_GET['price'], PDO::PARAM_INT);
    $query->bindParam("Quantity", $_GET['quantity'], PDO::PARAM_INT);
   
    $query->execute();
  }
  else{

    //checking product//

    $query = $pdo->prepare("select orderdetails.*  from orderdetails join orders on orders.Id = orderdetails.OrderId
     where SessionId =:sid and ProductId=:pid");
     $query->bindParam("sid",$sid,PDO::PARAM_STR);
     $query->bindParam("pid",$_GET['id'],PDO::PARAM_INT);
     $query->execute();
     $orders = $query->fetch(PDO::FETCH_ASSOC);

     //if not product is new

     if (gettype($orders)== "boolean" && $orders == false) {
      $query = $pdo->prepare("insert into orderdetails (ProductId,OrderId,Price,Quantity) values(:ProductId,:OrderId,:Price,:Quantity) ");
      $query->bindParam("ProductId", $_GET['id'], PDO::PARAM_INT);
      $query->bindParam("OrderId", $_SESSION['orderid'], PDO::PARAM_INT);
      $query->bindParam("Price", $_GET['price'], PDO::PARAM_INT);
      $query->bindParam("Quantity", $_GET['quantity'], PDO::PARAM_INT);
     
      $query->execute();
     }
     else{

     $query = $pdo->prepare("update orderdetails set Quantity=:Quantity where ProductId =:pid  ");
     $quantity = $_GET['quantity'] + $orders['Quantity'];

     $query->bindParam("pid", $_GET['id'], PDO::PARAM_INT);
     $query->bindParam("Quantity", $quantity, PDO::PARAM_INT);
    
     $query->execute();
     }
    
  }
  header("location: cart.php");
}


?>

<?php
$query = $pdo->prepare("select products.Name,products.Price,products.Photo,
orderdetails.Id as orderdetailid, orderdetails.ProductId, orderdetails.OrderId,orderdetails.Price, orderdetails.Quantity from products 
join orderdetails on orderdetails.ProductId = products.Id join Orders on Orders.Id = orderdetails.OrderId
where SessionId=:sid");
$query->bindParam("sid",$sid,PDO::PARAM_STR);
$query->execute();

$rows = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<?php  include 'header.php'; ?>
<style>
  /*--quantity-starts--*/
/* .quantity{
	margin: 1.5em 0;
	float:left;
} */
 .value-minus,
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
}
/*--quantity-end--*/

</style>

<script>
function dbupdatequantity(odid,ele)
{

	var qt = ele.children[1].innerText;
	var xhr = new XMLHttpRequest();
	xhr.open('get','api.php?method=UpdateQuantity&orderdetailid=' + odid + '&quantity=' + qt + '');
	xhr.onload = function() {
		console.log(xhr.response);
	};
	xhr.send();

}
</script>

<script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>

<section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Shopping Cart </h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Shop </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Cart Js-->

    
    <!-- SHOPING CART AREA START -->
    <section class="shoping-cart-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
           
          <?php
if (count($rows) > 0) {
          ?>
          
          <div class="product-list">
              <table>
                <thead>
                  <tr>
                    <th>Remove</th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  
                    <?php foreach ($rows as $row) {
                      $subtotal = $row['Price'] * $row['Quantity']; 
                      $total += $subtotal;
                      ?>
                      <tr>    
                   
                    <td>
                      <a href="deletecart.php?orderdetailid=<?php echo $row['orderdetailid']?>" ><i class="fa fa-trash-o"></i></a>
                    </td>
                    <td class="product-image">
                      <a href="#"><img style="height: 150px; width: 200px;" alt="#" src="../uploading/<?php echo $row['Photo'] ?>"></a>
                    </td>
                    <td>
                      <h4><a href="#"><?php echo $row['Name'] ?></a></h4>
                    </td>
                    <td>
                      <p>$ <?php echo $row['Price'] ?></p>
                    </td>
                    <td>
                                      <div class="quantity" id="myquantity">
                  <div class="quantity-select" onclick="dbupdatequantity(<?php echo $row['Id'] ?>,this)">
                  <div class="entry value-minus">&nbsp;</div>
                  <div class="entry value">
                  <span id="qnt<?php echo $row['Id'] ?>"><?php echo $row['Quantity'] ?></span>
                  </div>
                  <div class="entry value-plus active">&nbsp;</div>
                  </div>
                  </div>
                  
                   </td>
                   
                   <td>
                      <p>$ <?php echo ($row['Price'] * $row['Quantity']) ?></p>
                    </td>
                    </tr>
                    <?php
                  }
                    
                    ?>

              <th colspan="12">Total</th>
              <tr>
                <td colspan="12" >
                  $ <?php echo $total ?>
                </td>
              </tr>    
                  
                </tbody>
              </table>

            </div>

            <div class="row">
          <div class="col-md-6 text-center">
            <!-- <a href="#" class="btn-theme">Continue Shopping</a> -->
          </div>

          <?php

$query = $pdo->prepare("update orders set Amount=:Amount where SessionId =:sid ");
$query->bindParam("sid", $sid, PDO::PARAM_STR);
$query->bindParam("Amount", $total, PDO::PARAM_STR);
$query->execute();

          $query = $pdo->prepare("select  * from orders
          where SessionId=:sid");
          $query->bindParam("sid",$sid,PDO::PARAM_STR);
          $query->execute();
          
          $row = $query->fetch(PDO::FETCH_ASSOC);
          ?>
          <div class="col-md-12 text-right">
            <ul class="list-inline">
            <li><a href="products.php" class="btn-theme">Continue Shopping</a></li>
              <li><a href="checkout.php" class="btn-theme">Go to Checkout</a></li>
              <li><a href="deletecart.php?orderid=<?php echo $row['Id']?>" class="btn-theme">Cler Shopping Cart</a></li>
            </ul>
          </div>
        </div> 
                    <?php
                    }

                    if (count($rows ) == 0)  {
                    ?>
<div class="alert-danger">
  <h2 style="text-align: center;">Your Cart is Empty..!!</h2>
</div>
<?php
                    }
                    ?>

          </div>
        </div>
         
      </div>
    </section>
    <!-- SHOPING CART AREA END -->
    <?php include 'footer.php'?>