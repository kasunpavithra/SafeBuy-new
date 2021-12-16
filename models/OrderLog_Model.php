<?php

class OrderLog_Model extends Model{
    function __construct(){
        parent:: __construct();
    }
    function getOrders(){
        $orders =  $this->db->runQuery("SELECT Customer_id, amount,status,create_date FROM orders");
        return $orders;
    }

}