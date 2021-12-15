<?php

class OrderDetailsStaff_Model extends Model{
    function __construct(){
        parent:: __construct();
    }

    function getOrderDetails($orderId){
        $orderDetails =  $this->db->runQuery("SELECT Customer_id, amount,status,create_date FROM orders WHERE orderID=$orderId");
        return $orderDetails;
    }
    function getCustomerDetails($customerId){
        $customerDetails =  $this->db->runQuery("SELECT Name FROM customer WHERE Customer_id=$customerId");
        return $customerDetails;
    }
    function incrementStatus($order_id){
        $new_status=$this->db->runQuery("SELECT Customer_id, amount,status,create_date FROM orders WHERE orderID=$order_id")[0]["status"]+1;
        $this->db->runQuery("UPDATE orders SET status=$new_status WHERE orderID=$order_id");
        // $result = ruMySqlQuery("SELECT status FROM orders WHERE orderID=$order_id");
        // $row = $result->fetch_assoc();
        // $new_status =$row["status"]+1;
        // $sql ="UPDATE orders SET status=$new_status WHERE orderID=$order_id";
        // ruMySqlQuery($sql);
    }
    function approveOrder($order_id){
        $this->db->runQuery("UPDATE orders SET status=1 WHERE orderID=$order_id");

    }
    function declineOrder($order_id){
        $this->db->runQuery("UPDATE orders SET status=6 WHERE orderID=$order_id");

        // $sql ="UPDATE orders SET status=6 WHERE orderID=$order_id";
        // ruMySqlQuery($sql);
    }
    function closeOrder($order_id){
        $this->db->runQuery("UPDATE orders SET status=5 WHERE orderID=$order_id");

        // $sql ="UPDATE orders SET status=5 WHERE orderID=$order_id";
        // ruMySqlQuery($sql);
    }
    
}

?>