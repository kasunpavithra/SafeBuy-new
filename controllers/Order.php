<?php
//the previous implementation of the order class
// class Order extends Controller
// {
//     private $orders;
//     function __construct()
//     {
//         parent::__construct();
//         $this->loadModel("Order");
//         $this->orders = $this->model->getOrders();
//     }
//     function index()
//     {
//         $this->view->users = $this->model->getData();
//         $this->view->render('Test');
//     }

//     function getOrders()
//     {
//         return $this->orders;
//     }
//}

abstract class Order extends Controller{
    private $items;
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

        $this->customerName = $this->model->getCustomerDetails($this->getCustomerId())[0][0];
        
    }
    /**
     * Get the value of items
     */ 
    public function getItems()
    {
        return $this->items;
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
