<?php
include("dbconnection.php");

$orderid = $_GET['orderid'];
$orderdetailid = $_GET['orderdetailid'];

$query = $pdo->prepare("delete from orderdetails where Id = :id");
$query->bindparam("id",$orderdetailid,PDO::PARAM_INT); 
$query->execute();


//cart emoty


$query = $pdo->prepare("delete from orderdetails where OrderId = :id");
$query->bindparam("id",$orderid,PDO::PARAM_INT); 
$query->execute();


$query = $pdo->prepare("delete from orders where Id = :id");
$query->bindparam("id",$orderid,PDO::PARAM_INT);
$query->execute();

header("location: cart.php");

?>