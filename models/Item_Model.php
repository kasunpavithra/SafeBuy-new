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
    function getCategoryName($categoryId)
    {
        // print_r($this->db->runQuery("SELECT * FROM CATEGORY"));
        return $this->db->runQuery("SELECT category_name FROM CATEGORY where CategoryId='".$categoryId."'");
    }
    function getRatingList($itemId){
        $sql = "SELECT RATING,REVIEW FROM ORDERITEM WHERE ITEMID=$itemId";
        return $this->db->runQuery($sql);
    }
}
