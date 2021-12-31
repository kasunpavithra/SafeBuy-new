<?php
require_once 'OrderItem.php';
require_once 'ReturnOrderItem.php';
abstract class Order extends Controller{
    private $orderItems;
    private $orderId;
    private $customerId;
    private $createDate;
    private $status;
    private $amount;
    private $customerName;
    private $rating;

    function __construct(){
        parent::__construct();
        $this->orderId = $orderId;
        //load the model 
        $this->loadModel("Order");
        //get adn assign details
        $orderDetails= $this->model->getOrderDetails($this->orderId)[0];
        $this->customerId = $orderDetails[0];
        $this->amount = $orderDetails[1];
        $this->status = $orderDetails[2];
        $this->createDate = $orderDetails[3];
        $this->rating =$orderDetails[4];
        //get the customer name
        $this->customerName = $this->model->getCustomerDetails($this->getCustomerId())[0][0];
       
        $this->setOrderItems();
        
    }

    function setOrderItems(){
        $oItemsArr = $this->model->getOrderItems($this->orderId);
        // var_dump($oItemsArr);
        $this->orderItems = array();
        
        foreach($oItemsArr as $item){
            if($this->model instanceof BuyOrder_Model){
                array_push($this->orderItems,new OrderItem($item['OrderItemID']));
            }
            else if($this->model instanceof ReturnOrder_Model){
                array_push($this->orderItems,new ReturnOrderItem($item['returnitemID']));
            }
        }
    }


    /**
     * Get the value of orderItems
     */ 
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * Get the value of orderId
     */ 
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Get the value of createDate
     */ 
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the value of customerId
     */ 
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Get the value of customerName
     */ 
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * Get the value of rating
     */ 
    public function getRating()
    {
        return $this->rating;
    }

}
