<?php
class OrderStatusCustomer_model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getOrderInfo($orderId)
    {
        $order_info = $this->db->runQuery("SELECT * FROM orders WHERE orderID= $orderId");
        return $order_info;
    }
}
