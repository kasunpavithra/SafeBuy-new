<?php
class OrderItem_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getOrderItemDetails($orderItemId){
        $orderItemDetails =  $this->db->runQuery("SELECT * FROM orderitem WHERE OrderItemID=$orderItemId");
        return $orderItemDetails;
    }
}
?>