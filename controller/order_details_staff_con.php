<?php
    require_once 'model/db_con.php';
    
    //for the convinience order_id is hardcorded//

    
    $states = array("Being Approved","Ready to ship","Invoiced","Shipped","Delivered","Closed","Cancelled",
    "return being approved","rerutn canceled", "return closed");
    $states_present = array("Being Approved","Ready to ship","Invoice","Ship","Deliver","Close","Cancelled",
    "return being approved","rerutn canceled", "return closed");
    
    function getOrderDetails(){
        $order_id=1;
        $sql = "SELECT Customer_id, amount,status,create_date FROM orders WHERE orderID=$order_id";
        
        $result = ruMySqlQuery($sql);
        $row = $result->fetch_assoc();
        return array(
          "curr_stat"=>$row["status"],
          "order_date"=>$row["create_date"],
          "amount"=>$row["amount"],
          "customer_name"=>getCustommerDetails($row["Customer_id"]));
    }
    function getCustommerDetails($customerID){
      $sql = "SELECT Name FROM customer WHERE Customer_id=$customerID";
      $result = ruMySqlQuery($sql);
      $row = $result->fetch_assoc();
      return $row["Name"];
    }

    function incrementStatus($order_id){
        $result = ruMySqlQuery("SELECT status FROM orders WHERE orderID=$order_id");
        $row = $result->fetch_assoc();
        $new_status =$row["status"]+1;
        $sql ="UPDATE orders SET status=$new_status WHERE orderID=$order_id";
        ruMySqlQuery($sql);
    }
    function approveOrder($order_id){
        $sql ="UPDATE orders SET status=1 WHERE orderID=$order_id";
        ruMySqlQuery($sql);
    }
    function declineOrder($order_id){
        $sql ="UPDATE orders SET status=6 WHERE orderID=$order_id";
        ruMySqlQuery($sql);
    }
    function closeOrder($order_id){
        $sql ="UPDATE orders SET status=5 WHERE orderID=$order_id";
        ruMySqlQuery($sql);
    }

    function updateStatus(){
        $order_id=1;
        if(array_key_exists('updatestat', $_POST)) {
            incrementStatus($order_id);
          }if(array_key_exists('approve', $_POST)) {
            approveOrder($order_id);
          }if(array_key_exists('cancel', $_POST)) {
            declineOrder($order_id);
          }if(array_key_exists('close', $_POST)) {
            closeOrder($order_id);
          }
    }
?>
<!--  -->