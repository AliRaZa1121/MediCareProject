<?php

if (isset($_GET['method'])) {
    if ($_GET['method'] == 'UpdateQuantity') {
      header('content-type: application/javascript; encoding:utf-8;');
      echo UpdateQuantity($_GET['orderdetailid'],$_GET['quantity']);
    }
  }
  function UpdateQuantity($orderdetailid,$quantity)
  {
    include 'dbconnection.php';
    $query = $pdo->prepare("UPDATE OrderDetails SET Quantity=:Quantity  WHERE id=:id");
    $query->bindparam("id",$orderdetailid,PDO::PARAM_INT);
    $query->bindparam("Quantity",$quantity,PDO::PARAM_INT);
    $query->execute();
    return json_encode(true);
  }

?>
