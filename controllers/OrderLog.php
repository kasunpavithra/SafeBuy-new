<?php
require_once('BuyOrder.php');
class OrderLog extends Controller{
    const STAT =array("Being Approved","Ready to ship","Invoiced","Shipped","Delivered","Closed","Cancelled",
    "return being approved","rerutn canceled", "return closed");
    private $orders;

    function __construct()
    {
        parent::__construct();
        $this->loadModel("OrderLog");
        //create order objects here
        $orderArr = $this->model->getOrders();
        $count=0;
        foreach($orderArr as $order){
            $this->orders[$count++]=new BuyOrder($order['orderID']);
        }
    }
    function staffView(){
        $this->view->orderLog = $this;
        $this->view->render('OrderHistoryStaff');
    }
    

    /**
     * Get the value of orders
     */ 
    public function getOrders()
    {
        return $this->orders;
    }
}


?>