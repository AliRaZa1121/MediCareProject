<?php
include ('header.php');
$sid = session_id();


$query = $pdo->prepare("Select * from orders
 where SessionId = :sid");
$query->bindparam("sid",$sid,PDO::PARAM_STR); 
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);


$query = $pdo->prepare("select products.Name,products.Price,products.Photo,
orderdetails.Id as orderdetailid, orderdetails.ProductId, orderdetails.OrderId,orderdetails.Price, orderdetails.Quantity from products 
join orderdetails on orderdetails.ProductId = products.Id join Orders on Orders.Id = orderdetails.OrderId
where SessionId=:sid");
$query->bindParam("sid",$sid,PDO::PARAM_STR);
$query->execute();

$orders = $query->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>


<body>
    




<section class="inner-bg over-layer-black" style="background-image: url('img/bg/4.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="mini-title inner-style-2">
                        <h3>Medicative Hospital </h3>
                        <p><a href="index-one.html">Home</a> <span class="fa fa-angle-right"></span> <a href="#">Shop </a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section style="height: 50px; margin-top: 30px;">
<div class="alert-success" >
  <h2 style="text-align: center; font-weight: 500;">Thank you For Shopping, You will recived your order within 24 Hours  ..!!</h2>
</div>
</section>

<div class="container" style="background-color:snow;" id="invoice">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h4>Invoice No:  <?php echo $row['Id']?></h4>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					Name: <?php echo $row['CustomerName']?><br>
    					City: <?php echo $row['City']?><br>
    					Address: <?php echo $row['Address']?>
    				</address>
    			</div>
    		
            </div>
            
    		<div class="row">
            <div class="col-xs-6 text">
    				<address>
    					<strong>Order Date:</strong><br>
    					<?php echo $row['OrderDate']?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>

							<tr>
                                      <td class="text-center"><strong>Item Name</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>

							<?php foreach ($orders as $item): ?>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
                                     <td class="text-center"><?php echo $item['Name'] ?></td>
    								<td class="text-center">$<?php echo $item['Price'] ?></td>
    								<td class="text-center"><?php echo $item['Quantity'] ?></td>
    								<td class="text-right"><?php echo ($item['Price'] * $item['Quantity']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                               
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
                                    
                                    <td class="thick-line text-center"><strong>Sub Total</strong></td>
    								<td class="thick-line text-right">$<?php echo $row['Amount']  ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
                                    
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">$0</td>
                                </tr>
                                
    							<tr>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
                                    
                                    <td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">$<?php echo $row['Amount']  ?></td>
    							</tr>
                            </tbody>

    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
	</div>
	


<style>
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
</style>

 
<?php
include 'footer.php';
?>

<?php

session_unset();
session_destroy();
echo $sid;

?>