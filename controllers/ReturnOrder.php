<?php
class ReturnOrder extends Order{

    function __construct($orderId)
    {
        parent::__construct($orderId);
    }
    function index(){
        //view logic here
    }
}

?>