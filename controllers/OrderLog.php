<?php
require_once('BuyOrder.php');
require_once ('ReturnOrder.php');
class OrderLog extends Controller{
    const STAT =array("Being Approved","Ready to ship","Invoiced","Shipped","Delivered","Closed","Cancelled",
    "return being approved","rerutn canceled", "return closed");
    private $buyOrders;
    private $returnOrders;

    function __construct()
    {
        parent::__construct();
        $this->loadModel("OrderLog");
        //create order objects here
        $orderArr = $this->model->getOrders();
        $rOrderArr = $this->model->getReturnOrders();

        $this->buyOrders = array();
        $this->returnOrders = array();

        foreach($orderArr as $order){
            array_push($this->buyOrders, new BuyOrder($order['orderID']));
            
        }
        foreach($rOrderArr as $rOrder){
            array_push($this->returnOrders,new ReturnOrder($rOrder['returnorderID']));
        }
    }
    function staffView(){
        $this->view->orderLog = $this;
        $this->view->render('OrderHistoryStaff');
    }
    

    /**
     * Get the value of buyOrders
     */ 
    public function getBuyOrders()
    {
        return $this->buyOrders;
    }

    /**
     * Get the value of returnOrders
     */ 
    public function getReturnOrders()
    {
        return $this->returnOrders;
    }
}


?>