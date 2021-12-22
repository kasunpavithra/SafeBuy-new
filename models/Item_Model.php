<?php
class Item_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function getItemDetails($itemId){
        $itemDetails =  $this->db->runQuery("SELECT * FROM item WHERE itemID=$itemId");
        return $itemDetails;
    }
}
?>