<?php
class DeliveryPerson_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getOrders()
    {
        $status = 2;
        $order_info = $this->db->runQuery("SELECT * FROM orders WHERE status= $status");
        return $order_info;
    }

    function getCustomerinfo($customerId){
        $customer_info = $this->db->runQuery("SELECT * FROM customer WHERE Customer_id= $customerId");
        return $customer_info;
    }

    function getOrderItems($orderId){
        $OrderItems = $this->db->runQuery("SELECT * FROM orderitem WHERE orderID= $orderId");
        return $OrderItems;
    }
    function incrementStatus($staff_id)
    {
        $new_status = ($this->db->runQuery("SELECT status FROM staff WHERE Staff_id=$staff_id")[0][0]+ 1)%3;
        $this->db->runQuery("UPDATE staff SET status=$new_status WHERE Staff_id=$staff_id");
    }
}