<?php

include("dbconnection.php");

session_start();
$sid = session_id();
$total = "0.00";

if (isset($_POST['send'])) {
    $query = $pdo->prepare("update orders set CustomerName=:CustomerName, Address=:Address, Email=:Email,
    Phone=:Phone, City=:City where SessionId =:sid ");
    $query->bindParam("sid", $sid, PDO::PARAM_STR);
    $query->bindParam("CustomerName", $_POST['name'], PDO::PARAM_STR);
    $query->bindParam("Email", $_POST['email'], PDO::PARAM_STR);
    $query->bindParam("City", $_POST['city'], PDO::PARAM_STR);
    $query->bindParam("Address", $_POST['address'], PDO::PARAM_STR);
    $query->bindParam("Phone", $_POST['number'], PDO::PARAM_INT);
   
    $query->execute();

header("location: shoppingdone.php");

}
?>



<?php
$query = $pdo->prepare("select products.Name,products.Price,products.Photo, orders.Amount,
orderdetails.Id as orderdetailid, orderdetails.ProductId, orderdetails.OrderId,orderdetails.Price, orderdetails.Quantity from products 
join orderdetails on orderdetails.ProductId = products.Id join Orders on Orders.Id = orderdetails.OrderId
where SessionId=:sid");
$query->bindParam("sid",$sid,PDO::PARAM_STR);
$query->execute();

$rows = $query->fetchAll(PDO::FETCH_ASSOC);

?>

 

<?php include 'header.php'; 
?>
<section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Checkout </h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Shop </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="shop-tab">
                        <div class="shop-tab-inner">
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                                        <span class="round-tab">
                                            <i class="fa fa-map-o"></i> Billing Address
                                        </span>
                                    </a>
                                </li>
                              
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="panel panel-info panel-border">
                                    <div class="panel-heading panel-bg"><i class="fa fa-map-o"></i> Shipping Address</div>
                                        <div class="panel-body">
                                        <form class="form" method="post" action="" name="form">
                          <div class="col-md-12">
                              <input type="hidden" name="sid" value="">
                          </div>
                            <div class="col-md-12">
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name" required >
                            </div>
                          
                            <div class="col-md-12">
                                <input type="email" name="email" class="form-control" placeholder="Enter Your Email" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" name="city" class="form-control" placeholder="Enter Your City" required >
                            </div>
                           
                            <div class="col-md-12">
                                <input type="text" name="address" class="form-control" placeholder="Enter Your Address" required >
                            </div>
                           
                            <div class="col-md-12">
                                <input type="tel" name="number" class="form-control" placeholder="Enter Your Phone Number" required >
                            </div>
                           
                            <div class="col-md-12">
                                <div class="contact-textarea">
                                    <button class="btn btn-theme" name="send" type="submit">Place Your Order</button>
                                </div>
                            </div>

                        </form>
                                        
                                        </div>

                                </div>
                            </div>
                         
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <!--CREDIT CART PAYMENT-->
                                <div class="panel panel-info panel-border">
                                    <div class="panel-heading panel-bg"><span><i class="fa fa-check"></i></span>   Complete</div>
                                    <div class="panel-body">
                                        <h3>Complete</h3>
                                        <p>You have successfully completed all Shopping.</p>
                                    </div>
                                </div>
                                <!--CREDIT CART PAYMENT END-->
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 70px;" class="col-md-6 form-horizontal">
                    <div class="panel panel-info panel-border margin-top-none">
                        <div class="panel-heading panel-bg">
                            <i class="fa fa-television"></i> Review Order <div class="pull-right"></div>
                        </div>
                        
                        <div class="panel-body">
                            <?php
                            foreach ($rows as $row) {
                                // $subtotal = $row['Price'] * $row['Quantity'];
                                // $total += $subtotal;
                            ?>

                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                    <img class="img-responsive" src="../uploading/<?php echo $row['Photo'] ?>" />
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><?php echo $row['Name']?></div>
                                    <div class="col-xs-12"><small>Quantity:<span><?php echo $row['Quantity']?></span></small></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h5><span>$</span><?php echo $row['Price'] ?></h5>
                                </div>
                            </div>
                            <?php
                             $subtotal = $row['Price'] * $row['Quantity']; 
                             $total += $subtotal;
                            }
                            ?>
                           
                           
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>$</span><span><?php echo $total?></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
           </div>
        </div>
    </section>


    <?php include 'footer.php'?>