<?php
class Cart_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function printSomething()
    {
    }
    function loadCartItems($id)
    {
        return $this->db->runQuery("SELECT cart_item_id FROM cart_itemstemp WHERE (CART_ID='$id' AND ordered='0')");
    }
}
