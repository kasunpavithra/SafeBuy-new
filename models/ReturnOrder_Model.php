<?php
class ReturnOrder_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getOrderDetails($returnOrderId)
    {
        $orderDetails =  $this->db->runQuery("SELECT * FROM returnorder WHERE returnorderID=$returnOrderId");
        return $orderDetails;
    }
    function getCustomerDetails($customerId)
    {
        $customerDetails =  $this->db->runQuery("SELECT Name FROM customer WHERE Customer_id=$customerId");
        return $customerDetails;
    }
    function getOrderItems($returnOrderId)
    {
        $orderItems = $this->db->runQuery("SELECT returnitemID FROM returnitem WHERE returnOrderID=$returnOrderId");
        return $orderItems;
    }
    function incrementStatus($order_id)
    {
        $new_status = $this->db->runQuery("SELECT status FROM returnorder WHERE returnorderID=$order_id")[0]["status"] + 1;
        $this->db->runQuery("UPDATE returnorder SET status=$new_status WHERE returnorderID=$order_id");
    }
    function approveOrder($order_id)
    {
        $this->db->runQuery("UPDATE returnorder SET status=1 WHERE returnorderID=$order_id");
    }
    function declineOrder($order_id)
    {
        $this->db->runQuery("UPDATE returnorder SET status=4 WHERE returnorderID=$order_id");
    }
    function closeOrder($order_id)
    {
        $this->db->runQuery("UPDATE returnorder SET status=3 WHERE returnorderID=$order_id");
    }
}
