<?php
class CartItem_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething()
    {
    }
    function getDetail($id)
    {
        return $this->db->runQuery("SELECT * FROM CART_ITEMSTEMP WHERE cart_item_id=$id");
    }
  
}
