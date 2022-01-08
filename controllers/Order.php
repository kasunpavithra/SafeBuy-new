<?php
require_once 'OrderItem.php';
require_once 'ReturnOrderItem.php';
require_once 'Customer.php';

abstract class Order extends Controller{

    protected $orderItems;
    protected $orderId;
    protected $customerId;
    protected $createDate;
    protected $status;
    protected $amount;
    protected $review;
    protected $customerName;
    protected $closedDate;
    protected $customer;

    function __construct(){
        parent::__construct();
        //var_dump($this);
        $this->customerName = $this->model->getCustomerDetails($this->customerId)[0][0];
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
    public function getCustomer(){
        if(!isset($this->customer)){
            $this->customer = new Customer($this->customerId);
        }
        return $this->customer;
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
     * Get the value of closedDate
     */
    public function getClosedDate()
    {
        return $this->closedDate;
    }

    /**
     * Get the value of review
     */
    public function getReview()
    {
        return $this->review;
    }
}

?>
