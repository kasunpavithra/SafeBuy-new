<?php
class OrderItem extends Item{
    private $itemQuantity;

    function __construct($orderItem_details)
    {
        //use array slice here;
        parent::__construct($orderItem_details);
        $this->itemQuantity = $orderItem_details[8];
    }
}

?>