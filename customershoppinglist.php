
<?php
include 'dbconnection.php';

$query = $pdo->prepare("Select * from orders
 where Id = :id");
$query->bindparam("id",$_GET['id'],PDO::PARAM_INT); 
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);


$query = $pdo->prepare("select products.Name,products.Price,products.Photo,
orderdetails.Id as orderdetailid, orderdetails.ProductId, orderdetails.OrderId,orderdetails.Price, orderdetails.Quantity from products 
join orderdetails on orderdetails.ProductId = products.Id join Orders on Orders.Id = orderdetails.OrderId
where OrderId=:oid");
$query->bindParam("oid",$_GET['id'],PDO::PARAM_STR);
$query->execute();

$orders = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include 'header.php';
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Order Id = <?php echo $row['Id']?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $row['CustomerName']?><br>
    					<?php echo $row['City']?><br>
    					<?php echo $row['Address']?>
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
                                      <td><strong>Item Id</strong></td>
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
                                     <td><?php echo $item['ProductId'] ?></td>
                                     <td class="text-center"><?php echo $item['Name'] ?></td>
    								<td class="text-center">$<?php echo $item['Price'] ?></td>
    								<td class="text-center"><?php echo $item['Quantity'] ?></td>
    								<td class="text-right"><?php echo ($item['Price'] * $item['Quantity']) ?></td>
                                </tr>
                                <?php endforeach; ?>
                               
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    
                                    <td class="thick-line text-center"><strong>Sub Total</strong></td>
    								<td class="thick-line text-right">$<?php echo $row['Amount']  ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
                                    
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
    								<td class="no-line text-right">$0</td>
                                </tr>
                                
    							<tr>
    								<td class="no-line"></td>
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