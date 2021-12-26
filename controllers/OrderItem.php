<?php
require_once 'Item.php';
class OrderItem extends Item{
    private $orderItemId;
    private $orderId;
    private $quantity;
    private $soldPrice;
    private $soldDiscount;
    private $oItemRating ;
    private $oItemReview;
    


    function __construct($orderItemId)
    {
        $this->orderItemId = $orderItemId;
        //load temp model;
        $this->loadModel("OrderItem");
        $orderItemDe = $this->model->getOrderItemDetails($orderItemId)[0];

        $this->orderId = $orderItemDe[1];
        $this->quantity = $orderItemDe[3];
        $this->soldPrice = $orderItemDe[4];
        $this->soldDiscount = $orderItemDe[5];
        $this->oItemRating = $orderItemDe[6];
        $this->oItemReview = $orderItemDe[7];
        $itemId = $orderItemDe[2];
        parent::__construct($itemId);
        //echo "that was sucessful!";
        // var_dump($this);
    }
    function index()
    {
        echo "this is overidden";
        //You need to add prsentation logic here or in another funtion
    }

    /**
     * Get the value of oItemRating
     */ 
    public function getOItemRating()
    {
        return $this->oItemRating;
    }

    /**
     * Get the value of oItemReview
     */ 
    public function getOItemReview()
    {
        return $this->oItemReview;
    }

    /**
     * Get the value of orderItemId
     */ 
    public function getOrderItemId()
    {
        return $this->orderItemId;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the value of quantity
     */ 


}
