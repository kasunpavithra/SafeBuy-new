<?php

class OrderLog_Model extends Model{
    function __construct(){
        parent:: __construct();
    }
    function getOrders(){
        $orders =  $this->db->runQuery("SELECT orderID,Type FROM orders");
        return $orders;
    }

}
?>