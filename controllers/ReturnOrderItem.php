<?php
require_once 'Item.php';
class ReturnOrderItem extends Item{
    private $rOrderItemId; // return Order item Id
    private $rOrderId;     //return order Id
    private $quantity;    //return quantity
    private $returnReview; //reason to return
    


    function __construct($rOrderItemId)
    {
        $this->rOrderItemId = $rOrderItemId;
        //load temp model;
        $this->loadModel("ReturnOrderItem");
        $orderItemDe = $this->model->getOrderItemDetails($rOrderItemId)[0];

        $this->rOrderId = $orderItemDe['returnitemID'];
        $this->quantity = $orderItemDe['quantity'];
        $this->returnReview = $orderItemDe['review'];
        $itemId = $orderItemDe['itemID'];
        parent::__construct($itemId);
        //echo "that was sucessful!";
        // var_dump($this);
    }
    function index()
    {
        echo "this is overidden";
        //You need to add prsentation logic here or in another funtion
    }
}

?>