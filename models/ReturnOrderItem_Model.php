<?php
class ReturnOrderItem_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getOrderItemDetails($orderItemId){
        $orderItemDetails =  $this->db->runQuery("SELECT * FROM returnitem WHERE returnItemID=$orderItemId");
        return $orderItemDetails;
    }
}
?>