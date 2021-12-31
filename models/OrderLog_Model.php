<?php

class OrderLog_Model extends Model{
    function __construct(){
        parent:: __construct();
    }
    function getOrders(){
        $orders =  $this->db->runQuery("SELECT orderID FROM orders");
        return $orders;
    }
    function getReturnOrders(){
        $orders =  $this->db->runQuery("SELECT returnorderID FROM returnorder");
        return $orders;
    }

}
?>