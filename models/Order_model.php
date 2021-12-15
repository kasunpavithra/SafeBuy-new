<?php
class Order_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething()
    {
    }
    function getData()
    {
        // return $this->db->runQuery("SELECT * from customer");
    }
    function getOrders()
    {
        $orders = $this->db->runQuery("SELECT * FROM ORDERS");
        return $orders;
    }
}
