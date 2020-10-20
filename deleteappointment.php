<?php
include("dbconnection.php");

$del = $_GET['aid'];
$query = $pdo->prepare("delete from appointments where Id = :id");
$query->bindparam("id",$del,PDO::PARAM_INT); 
$query->execute();

header("location: appointments.php");

?>