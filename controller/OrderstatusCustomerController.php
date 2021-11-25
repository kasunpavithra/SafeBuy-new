<?php
session_start();
include ("model/db_con.php");
include("functions.php");
$user_data = check_login();
$orderId = 1;
$sql = "SELECT * FROM orders WHERE orderID= $orderId";
$result=ruMySqlQuery($sql);
// $result = $con->query($sql);
$row = $result->fetch_assoc();
if (mysqli_fetch_lengths($result) > 0) {
    $stat_no = $row["status"];
    $order_id = $row["orderID"];
} else {
    header("Location: NoOrder.php");
}
