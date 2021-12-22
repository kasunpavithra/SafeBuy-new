<?php
require_once 'OrderItem.php';
abstract class Order extends Controller{
    private $orderItems;
    private $orderId;
    private $customerId;
    private $createDate;
    private $status;
    private $amount;
    private $customerName;

    function __construct($orderId){
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
        //get the customer name
        $this->customerName = $this->model->getCustomerDetails($this->getCustomerId())[0][0];

        $this->setOrderItems();
        
    }

    function setOrderItems(){
        $oItemsArr = $this->model->getOrderItems($this->orderId);
        var_dump($oItemsArr);
        $count=0;
        foreach($oItemsArr as $item){
            $this->orderItems[$count++]=new OrderItem($item['OrderItemID']);
        }
        var_dump($this->orderItems);
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
}

?>
